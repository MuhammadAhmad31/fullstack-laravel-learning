# README --- Membuat Layout Admin Manual di Laravel 12 (Tailwind CSS)

Dokumentasi ini menjelaskan cara membuat layout admin secara manual di
Laravel 12 menggunakan Blade template dan Tailwind CSS. Fokus utamanya
adalah **membuat layout** tanpa membahas instalasi Tailwind atau
konfigurasi lainnya.

------------------------------------------------------------------------

## 🗂️ **1. Struktur Folder**

Buat folder dan file:

    resources/views/layouts/admin.blade.php
    resources/views/admin/dashboard.blade.php

------------------------------------------------------------------------

## 🧱 **2. Layout Admin**

File: **resources/views/layouts/admin.blade.php**

``` blade
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">

    <div class="flex min-h-screen">

        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md">
            <div class="p-4 font-bold text-xl border-b">
                Admin Panel
            </div>

            <nav class="mt-4">
                <a href="/admin/dashboard"
                   class="block px-4 py-2 text-gray-700 hover:bg-gray-200">
                    Dashboard
                </a>
                <a href="/admin/users"
                   class="block px-4 py-2 text-gray-700 hover:bg-gray-200">
                    Users
                </a>
                <a href="/admin/settings"
                   class="block px-4 py-2 text-gray-700 hover:bg-gray-200">
                    Settings
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 p-6">
            <h1 class="text-2xl font-semibold mb-6">@yield('header')</h1>

            @yield('content')
        </main>

    </div>

</body>
</html>
```

------------------------------------------------------------------------

## 📄 **3. Contoh Halaman Admin**

File: **resources/views/admin/dashboard.blade.php**

``` blade
@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header', 'Dashboard')

@section('content')
    <div class="p-4 bg-white rounded shadow">
        Halo, ini halaman dashboard.
    </div>
@endsection
```

------------------------------------------------------------------------

## 🛣️ **4. Routing**

Tambahkan route untuk halaman admin:

File: **routes/web.php**

``` php
Route::prefix('admin')->group(function () {
    Route::view('/dashboard', 'admin.dashboard');
});
```

------------------------------------------------------------------------

## ✅ **Hasil Akhir**

Dengan langkah ini, kamu sudah memiliki:

-   Layout admin reusable\
-   Sidebar sederhana\
-   Header halaman\
-   Area content yang bisa berubah sesuai halaman\
-   Struktur yang bersih dan mudah dikembangkan

------------------------------------------------------------------------

Jika ingin menambah fitur seperti sidebar collapse, navbar, dark mode,
atau Blade component, silakan minta bantuan.
