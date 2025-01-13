<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormulaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//category Routes
Route::get('/categories', [CategoryController::class, 'index' ])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create' ])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store' ])->name('categories.store');
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit' ])->name('categories.edit');
Route::put('/categories/{category}/update', [CategoryController::class, 'update' ])->name('categories.update');


//formula Routes
Route::get('/formulas', [FormulaController::class, 'index'])->name('formulas.index');
Route::get('/formulas/create', [FormulaController::class, 'create'])->name('formulas.create');
Route::post('/formulas', [FormulaController::class, 'store'])->name('formulas.store');
Route::get('/formulas/{formula}/edit', [FormulaController::class, 'edit'])->name('formulas.edit');
Route::put('/formulas/{formula}/update', [FormulaController::class, 'edit'])->name('formulas.edit');
