<?php

use App\Http\Controllers\UsersController;
use App\Http\Controllers\SendMessage;
use Illuminate\Support\Facades\Route;

// Route::get('/', [UsersController::class, 'index']);
// Route::resource('/', UsersController::class)->only([
//     'index', 'show'
// ]);

Route::resource('users', UsersController::class)->names([
    'index' => 'users.list',
    'show' => 'users.detail',
    'create' => 'users.create',
    'edit' => 'users.edit',
    'destroy' => 'users.delete',
]);

Route::post('/send-message', SendMessage::class)->name('send.message');

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/users/create', function () {
//     return "User Create Page";
// })->name('users.create');

// Route::get('/users/{id}/edit', function ($id) {
//     return "Edit User with ID: " . $id;
// })->name('users.edit');

// Route::delete('/users/{id}', function ($id) {
//     return "Delete User with ID: " . $id;
// })->name('users.delete');