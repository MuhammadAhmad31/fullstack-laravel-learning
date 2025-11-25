<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SendMessage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('dashboard')->middleware('auth')->group(function () {

    Route::get('/', function () {
        return redirect()->route('posts.list');
    })->name('dashboard');

    Route::resource('users', UsersController::class)->names([
        'index'   => 'users.list',
        'show'    => 'users.detail',
        'create'  => 'users.create',
        'edit'    => 'users.edit',
        'destroy' => 'users.delete',
    ]);

    Route::resource('posts', PostsController::class)->names([
        'index'   => 'posts.list',
        'show'    => 'posts.detail',
        'create'  => 'posts.create',
        'edit'    => 'posts.edit',
        'destroy' => 'posts.delete',
    ]);

});

Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest')->name('register.perform');

Route::get('/login', [AuthController::class, 'showLogin'])->middleware('guest')->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest')->name('login.perform');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

Route::post('/send-message', SendMessage::class)->name('send.message');