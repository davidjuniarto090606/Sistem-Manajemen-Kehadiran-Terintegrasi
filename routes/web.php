<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Home
Route::get('/', [HomeController::class, 'index']);

// Contact
Route::get('/contact', [HomeController::class, 'contact']);

// Welcome bawaan Laravel
Route::get('/welcome', function () {
    return view('welcome');
});

// Contoh parameter
Route::get('/user/{id}', function ($id) {
    return 'User dengan ID ' . $id;
});

// Admin group
Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });

    Route::get('/users', function () {
        return 'Admin Users';
    });

});

/*
|--------------------------------------------------------------------------
| Praktikum List Barang
|--------------------------------------------------------------------------
*/

// Versi fleksibel (dari GitHub)
Route::get('/listbarang/{id}/{nama}', [ListBarangController::class, 'tampilkan']);

// Versi sederhana (punya kamu)
Route::get('/barang', [ListBarangController::class, 'tampilkan']);

// View statis
Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/product', 'product');
Route::view('/register', 'register');

/*
|--------------------------------------------------------------------------
| PBL - Sistem Manajemen Kehadiran
|--------------------------------------------------------------------------
*/

// Login
Route::get('/login', [LoginController::class, 'index']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Attendance
Route::get('/attendance', [AttendanceController::class, 'index']);