<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PelanggaranController;
use App\Http\Controllers\Api\ViolationController;
use Illuminate\Support\Facades\Auth;

// Redirect root URL to login
Route::get('/', [AuthController::class, 'login'])->name('home');

// Login Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'handleLogin'])->name('login.submit');

// Register Routes
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'handleRegister']);

// Group route untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('/pemantauan', fn () => view('pemantauan'))->name('pemantauan');
    Route::get('/pelanggaran', [PelanggaranController::class, 'show'])->name('pelanggaran');
    Route::get('/statistik', [ViolationController::class, 'showStats'])->name('statistik');
});

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');