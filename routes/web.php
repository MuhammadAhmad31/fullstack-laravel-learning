<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SendMessage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShippingController;

Route::get('/', [ShippingController::class, 'pageCheckOngkir'])->name('home');

Route::prefix('dashboard')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('posts.list');
    })->name('dashboard.index');
    
    Route::resource('users', UsersController::class)->names([
        'index' => 'users.list',
        'show' => 'users.detail',
        'create' => 'users.create',
        'edit' => 'users.edit',
        'destroy' => 'users.delete',
    ]);

    Route::resource('posts', PostsController::class)->names([
        'index' => 'posts.list',
        'show' => 'posts.detail',
        'create' => 'posts.create',
        'edit' => 'posts.edit',
        'destroy' => 'posts.delete',
    ]);
});

Route::get('/login', [AuthController::class, 'loginPage'])->middleware('guest')->name('auth.loginPage');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login');
Route::get('/register', [AuthController::class, 'registerPage'])->middleware('guest')->name('auth.registerPage');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest')->name('auth.register');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('auth.logout');

Route::post('/send-message', SendMessage::class)->name('send.message');