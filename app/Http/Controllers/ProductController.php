<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductCreatedMail;
use App\Mail\ProductCreatedMailWithQueue;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Cache::remember('products_all', 60, function () {
            return Product::all();
        });

        return ApiResponse::success($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
        ]);

        $product = Product::create($validated);

        // ❌ TANPA QUEUE (BLOCKING)
        Mail::to('test@example.com')
            ->send(new ProductCreatedMail($product));

        /// ✅ DENGAN QUEUE (NON-BLOCKING)
        // Mail::to('test@example.com')
        //     ->queue(new ProductCreatedMailWithQueue($product));

        Cache::forget('products_all');

        return ApiResponse::success(
            $product,
            'Product created & email sent (sync)',
            201
        );
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Cache::remember("product_{$id}", 60, function () use ($id) {
            return Product::find($id);
        });

        if (!$product) {
            return ApiResponse::error('Product not found', 404);
        }

        return ApiResponse::success($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return ApiResponse::error('Product not found', 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'price' => 'sometimes|required|integer',
        ]);

        $product->update($validated);

        Cache::forget('products_all');
        Cache::forget("product_{$id}");

        return ApiResponse::success($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return ApiResponse::error('Product not found', 404);
        }

        $product->delete();

        Cache::forget('products_all');
        Cache::forget("product_{$id}");

        return ApiResponse::success(null, 'Product deleted successfully');
    }
}
