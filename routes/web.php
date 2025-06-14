<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ImageController;

Route::redirect('/', '/products');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store'); 
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::get('/products/{id}/confirm-delete', [ProductController::class, 'confirmDelete'])->name('products.confirmDelete');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/upload', [ImageController::class, 'create']);
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::delete('/image/delete/{id}', [ImageController::class, 'destroy'])->name('image.delete');