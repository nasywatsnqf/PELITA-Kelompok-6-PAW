<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Register
Route::get('/register', [AuthController::class, 'showRegister'])
    ->name('register');

Route::post('/register', [AuthController::class, 'register'])
    ->name('register.store');

// Login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.store');

// Halaman yang hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', fn () => 'Login berhasil (dashboard sementara)')
        ->name('dashboard');

    // Halaman Profile
    Route::get('/profil', [ProfileController::class, 'index'])
        ->name('profil');

    // Halaman Edit Profile
    Route::get('/profil/edit', [ProfileController::class, 'edit'])
        ->name('profil.edit');

    // Proses menyimpan perubahan Profile
    Route::put('/profil', [ProfileController::class, 'update'])
        ->name('profil.update');
    
        // Hapus akun
    Route::delete('/profil', [ProfileController::class, 'destroy'])->name('profil.destroy');

    // Keluar akun
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});