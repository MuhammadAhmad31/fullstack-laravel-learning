<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProductCreatedMail;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Cache::remember('products_all', 60, function () {
            return Product::all();
        });

        return ApiResponse::success($data);
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

        if(!$validated) {
            return ApiResponse::error('Validation Error', 422);
        }

        $product = Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
        ]);

        Mail::to('recipient@example.com')->queue(new ProductCreatedMail($product));

        Cache::forget('products_all');

        return ApiResponse::success($product, "Product created successfully", 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(String $id)
    {
        $product = Cache::remember("product_{$id}", 60, function () use ($id) {
            return Product::find($id);
        });

        if(!$product) {
            return ApiResponse::error('Product not found', 404);
        }

        return ApiResponse::success($product);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        $product = Product::find($id);

        if(!$product) {
            return ApiResponse::error('Product not found', 404);
        }

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|nullable|string',
            'price' => 'sometimes|required|integer',
        ]);

        if(!$validated) {
            return ApiResponse::error('Validation Error', 422);
        }

        $product->update($validated);

        Cache::forget("product_{$id}");
        Cache::forget('products_all');

        return ApiResponse::success($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        $product = Product::find($id);

        if(!$product) {
            return ApiResponse::error('Product not found', 404);
        }

        $product->delete();

        Cache::forget("product_{$id}");
        Cache::forget('products_all');

        return ApiResponse::success(null, 'Product deleted successfully');
    }
}
