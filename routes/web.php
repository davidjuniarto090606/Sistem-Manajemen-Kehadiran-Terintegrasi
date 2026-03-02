<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListBarangController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AttendanceController;


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


Route::prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return 'Admin Dashboard';
    });

    Route::get('/users', function () {
        return 'Admin Users';
    });

});

Route::get('/barang', [ListBarangController::class, 'tampilkan']);

Route::view('/home', 'home');
Route::view('/about', 'about');
Route::view('/product', 'product');
Route::view('/register', 'register');


/*
|--------------------------------------------------------------------------
| PBL - SISTEM KEHADIRAN
|--------------------------------------------------------------------------
*/

// Login
Route::get('/login', [LoginController::class, 'index']);

// Dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);

// Attendance
Route::get('/attendance', [AttendanceController::class, 'index']);