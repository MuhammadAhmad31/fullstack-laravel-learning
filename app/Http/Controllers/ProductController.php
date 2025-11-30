<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Helpers\ApiResponse;

class ProductController extends Controller
{
    public function index()
    {
        return ApiResponse::success(Product::all(), 'List products');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|integer',
        ]);

        if(!$validated) {
            return ApiResponse::error('Validation failed', 422);
        }

        $product = Product::create($validated);

        return ApiResponse::success($product, 'Product created', 201);
    }

    public function show(String $id)
    {
        $product = Product::find($id);
        if(!$product) {
            return ApiResponse::error('Product not found', 404);
        }

        return ApiResponse::success($product, 'Product detail');
    }

    public function update(Request $request, String $id)
    {
        $product = Product::find($id);

        if(!$product) {
            return ApiResponse::error('Product not found', 404);
        }

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'description'=> 'nullable|string',
            'price'      => 'required|integer',
        ]);

        if(!$validated) {
            return ApiResponse::error('Validation failed', 422);
        }

        $product->update($validated);

        return ApiResponse::success($product, 'Product updated');
    }

    public function destroy(String $id)
    {
        $product = Product::find($id);
        
        if(!$product) {
            return ApiResponse::error('Product not found', 404);
        }

        $product->delete();

        return ApiResponse::success(null, 'Product deleted', 204);
    }
}
