<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StockInController;

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/stock-in/create', [StockInController::class, 'create'])->name('stock-in.create');
Route::post('/stock-in/store', [StockInController::class, 'store'])->name('stock-in.store');
Route::get('/stockin', [StockInController::class, 'index'])->name('stockin.index');

// Autocomplete Route
Route::get('/autocomplete-products', [StockInController::class, 'autocomplete']);
