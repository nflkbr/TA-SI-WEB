<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\ProductController;

// ── Auth ───────────────────────────────────────────────────────────────────
Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login'])->name('login.post');
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

// ── Register ───────────────────────────────────────────────────────────────
Route::get('/register',  [RegisterController::class, 'showRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

// ── Google OAuth ───────────────────────────────────────────────────────────
Route::get('/auth/google/redirect', [GoogleAuthController::class, 'redirect'])->name('google.redirect');
Route::get('/auth/google/callback', [GoogleAuthController::class, 'callback'])->name('google.callback');

// ── Protected Routes ───────────────────────────────────────────────────────
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('index');
    })->name('home');

    Route::resource('products', ProductController::class)->names([
        'index'   => 'products',
        'store'   => 'products.store',
        'update'  => 'products.update',
        'destroy' => 'products.destroy',
    ]);
});