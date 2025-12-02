<?php

use App\Http\Controllers\AuthApiController as AuthController;
use App\Http\Controllers\ProductController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware('jwt.verify')->group(function () {
    Route::apiResource('products', ProductController::class)->names([
        'index' => 'products.list',
        'show' => 'products.detail',
        'store' => 'products.create',
        'update' => 'products.update',
        'destroy' => 'products.delete',
    ]);
});
