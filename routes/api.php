<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\API\AuthApiController;

Route::post('/login', [AuthApiController::class, 'login'])->name('api.auth.login');

Route::middleware('jwt.verify')->group(function () {
    Route::apiResource('products', ProductController::class)->names([
        'index' => 'products.list',
        'show' => 'products.detail',
        'store' => 'products.create',
        'update' => 'products.update',
        'destroy' => 'products.delete',
    ]);
});