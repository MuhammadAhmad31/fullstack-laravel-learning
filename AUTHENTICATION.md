# Cara Membuat Authentication pada Laravel

## Bagaimana cara kita membuat login dan register pada laravel ?

Login dan register sangat penting untuk aplikasi kita, agar tidak semua orang bisa menambah dan memanipulasi data pada aplikasi kita, disini kita praktek sederhana saja gimana caranya membuat sebuah login dan register pada laravel

### Pertama kita membuat Controller untuk Authentication

Cukup tuliskan perintah dibawah ini untuk menjalankan controller

``` terminal
    php artisan make:controller AuthController 
```

perintah ini akan membuat AuthController di file controller `app/Http/Controllers/AuthControllers` masukkan code ini didalam controller

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'name' => 'required|string|max:255',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'name' => $request->name,
        ]);

        return redirect('/login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    public function showLogin()
    {
        return view('pages.auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('posts.list');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

```

### Kedua, kita buat tampilan login dan register

kita tambahkan file login dan register pada `resources/views/pages/auth`

`login.blade.php`
```html
<x-form-component
    :fields="[
        'email' => ['label' => 'Email', 'type' => 'email'],
        'password' => ['label' => 'Password', 'type' ='password'],
    ]"
    :errors="$errors"
    :action="route('login.perform')"
    method="POST"
    submitText="Login"
/>
```

`register.blade.php`
```html
<x-form-component
    :fields="[
        'email' => ['label' => 'Email', 'type' => 'email'],
        'name' => ['label' => 'Name', 'type' => 'text'],
        'password' => ['label' => 'Password', 'type' ='password'],
    ]"
    :errors="$errors"
    :action="route('register.perform')"
    method="POST"
    submitText="Register"
/>
```

### Kedua, kita buat route untuk login dan register page dengan middleware

```php

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

```
