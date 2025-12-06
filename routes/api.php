<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\ShippingController;

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

Route::get('/shipping/provinces', [ShippingController::class, 'getProvinces'])->name('shipping.provinces');
Route::get('/shipping/cities/{provinceId}', [ShippingController::class, 'getCities'])->name('shipping.cities');
Route::get('/shipping/districts/{cityId}', [ShippingController::class, 'getDistricts'])->name('shipping.districts');
Route::post('/shipping/estimation', [ShippingController::class, 'postEstimation'])->name('shipping.estimation');