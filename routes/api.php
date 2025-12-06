<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\API\AuthApiController;
use App\Http\Controllers\RajaOngkirController;

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

Route::get('/rajaongkir/provinces', [RajaOngkirController::class, 'provinces'])->name('rajaongkir.provinces');
Route::get('/rajaongkir/cities/{provinceId}', [RajaOngkirController::class, 'cities'])->name('rajaongkir.cities');
Route::post('/rajaongkir/cost', [RajaOngkirController::class, 'cost'])->name('rajaongkir.cost');
Route::get('/rajaongkir/district/{cityId}', [RajaOngkirController::class, 'district'])->name('rajaongkir.district');
Route::get('/rajaongkir/subdistrict/{districtId}', [RajaOngkirController::class, 'subdistrict'])->name('rajaongkir.subdistrict');