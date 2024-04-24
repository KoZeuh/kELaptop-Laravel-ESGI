<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

use App\Http\Controllers\Auth\ProfileController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/product/list', [ProductController::class, 'list']);
Route::get('/product/show/{product}', [ProductController::class, 'show']);

Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CartController::class, 'showCheckout']);
    
    Route::post('/cart/addOrUpdate', [CartController::class, 'addToCart']);
    Route::get('/cart/remove/{product}', [CartController::class, 'removeFromCart']);

    Route::get('/profile', [ProfileController::class, 'index']);

    Route::get('/admin', [AdminController::class, 'index']);
});


Auth::routes();
