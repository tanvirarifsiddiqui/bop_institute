<?php

use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use Illuminate\Support\Facades\Route;

// Admin Guest Routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware('guest:admin') // For Laravel 9+
    ->group(function () {
        Route::get('register', [RegisteredAdminController::class, 'create'])->name('register');
        Route::post('register', [RegisteredAdminController::class, 'store']);
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);
    });

// Admin Authenticated Routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware('auth:admin')
    ->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.home');
        })->name('home');
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');
    });
