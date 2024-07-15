<?php
// routes/web.php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\PropertyController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');

// Rotas para criar categorias
Route::get('/categories/create', [CategoryController::class, 'create'])
    ->middleware(['auth'])
    ->name('categories.create');

Route::post('/categories', [CategoryController::class, 'store'])
    ->middleware(['auth'])
    ->name('categories.store');

// Rotas para criar subcategorias
Route::get('/subcategories/create', [SubcategoryController::class, 'create'])
    ->middleware(['auth'])
    ->name('subcategories.create');

Route::post('/subcategories', [SubcategoryController::class, 'store'])
    ->middleware(['auth'])
    ->name('subcategories.store');

// Rotas para criar propriedades
Route::get('/properties/create', [PropertyController::class, 'create'])
    ->middleware(['auth'])
    ->name('properties.create');

Route::post('/properties', [PropertyController::class, 'store'])
    ->middleware(['auth'])
    ->name('properties.store');

Route::put('/properties/{property}', [PropertyController::class, 'update'])->name('properties.update');
Route::delete('/properties/{property}', [PropertyController::class, 'destroy'])->name('properties.destroy');

require __DIR__ . '/auth.php';
