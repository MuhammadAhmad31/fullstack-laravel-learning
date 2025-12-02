<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::apiResource('products', ProductController::class)->names([
    'index' => 'products.list',
    'show' => 'products.detail',
    'store' => 'products.create',
    'update' => 'products.update',
    'destroy' => 'products.delete',
]);