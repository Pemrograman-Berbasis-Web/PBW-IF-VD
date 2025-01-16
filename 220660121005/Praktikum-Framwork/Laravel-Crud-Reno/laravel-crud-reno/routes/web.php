<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Menampilkan daftar post pada halaman utama
Route::get('/', [PostController::class, 'index']); // Mengarah ke daftar post

// Menggunakan Route::resource() untuk otomatis menghasilkan rute CRUD
Route::resource('posts', PostController::class);
