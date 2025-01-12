<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FormulaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories', [CategoryController::class, 'index' ])->name('categories.index');
Route::get('/categories/create', [CategoryController::class, 'create' ])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store' ])->name('categories.store');

Route::get('/formulas', [FormulaController::class, 'index'])->name('formulas.index');
Route::get('/formulas/create', [FormulaController::class, 'create'])->name('formulas.create');
Route::post('/formulas', [FormulaController::class, 'store'])->name('formulas.store');
