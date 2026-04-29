<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Halaman login
Route::get('/login', function () {
    // kalau sudah login, langsung ke home
    if (session('logged_in')) {
        return redirect('/');
    }
    return view('login');
})->name('login');

Route::post('/login', [AuthController::class, 'login']);

// Logout
Route::get('/logout', [AuthController::class, 'logout']);

// 🔒 Halaman utama (WAJIB LOGIN)
Route::get('/', function () {
    if (!session('logged_in')) {
        return redirect('/login');
    }
    return view('index');
});