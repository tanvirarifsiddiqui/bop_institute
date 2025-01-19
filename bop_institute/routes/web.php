<?php

use App\Http\Controllers\AdminHomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormulaController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', function () {
    return view('welcome');
});

// Authenticated User Routes
Route::middleware(['auth', 'verified'])->group(function () {
    // User Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Profile Management
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')
    ->name('admin.')
    ->middleware(['auth:admin', 'verified'])
    ->group(function () {
        // Admin Home
        Route::get('/dashboard', [AdminHomeController::class, 'index'])->name('home');

        // Category Routes
        Route::prefix('categories')->name('categories.')->group(function () {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('/create', [CategoryController::class, 'create'])->name('create');
            Route::post('/', [CategoryController::class, 'store'])->name('store');
            Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');
            Route::put('/{category}', [CategoryController::class, 'update'])->name('update');
            Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
        });

        // Formula Routes
        Route::prefix('formulas')->name('formulas.')->group(function () {
            Route::get('/image/{id}', [FormulaController::class, 'viewImage'])->name('viewImage');
            Route::get('/pdf/{id}', [FormulaController::class, 'viewPdf'])->name('viewPdf');
            Route::get('/', [FormulaController::class, 'index'])->name('index');
            Route::get('/create', [FormulaController::class, 'create'])->name('create');
            Route::post('/', [FormulaController::class, 'store'])->name('store');
            Route::get('/{formula}/edit', [FormulaController::class, 'edit'])->name('edit');
            Route::put('/{formula}', [FormulaController::class, 'update'])->name('update');
            Route::delete('/{formula}', [FormulaController::class, 'destroy'])->name('destroy');
        });
    });


//guests & users
// Public Routes
Route::get('/', [FormulaController::class, 'topPurchasedFormulas'])->name('welcome');

// Include Breeze Authentication Routes
require __DIR__ . '/auth.php';
require __DIR__ . '/admin-auth.php';
