<?php

use App\Http\Controllers\ItemController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ItemController::class, 'index'])->name('items.index');
Route::get('/items/create', [ItemController::class, 'create'])->name('items.create')->middleware('auth');
Route::post('/items', [ItemController::class, 'store'])->name('items.store')->middleware('auth');
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');

// Auth bawaan Laravel (untuk sementara)
Route::get('/login', function () { return "Halaman Login (Akan dikerjakan Ilham)"; })->name('login');
