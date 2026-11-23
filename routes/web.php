<?php

use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// Halaman Utama (Tugas Devin & Arya)
Route::get('/', [ItemController::class, 'index'])->name('items.index');

// Route yang butuh Login (Tugas Devin)
Route::middleware('auth')->group(function () {
    Route::get('/items/create', [ItemController::class, 'create'])->name('items.create');
    Route::post('/items', [ItemController::class, 'store'])->name('items.store');
    Route::get('/items/{item}/edit', [ItemController::class, 'edit'])->name('items.edit');
    Route::put('/items/{item}', [ItemController::class, 'update'])->name('items.update');
    Route::delete('/items/{item}', [ItemController::class, 'destroy'])->name('items.destroy');
    
    // Route Profil bawaan Breeze (Tugas Ilham)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Halaman Detail (Tugas Arya)
Route::get('/items/{item}', [ItemController::class, 'show'])->name('items.show');

// Dashboard Breeze (opsional)
//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

// Route Auth dari Breeze (WAJIB ADA DI PALING BAWAH)
require __DIR__.'/auth.php';