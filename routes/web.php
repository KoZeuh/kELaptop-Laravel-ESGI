<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/product/show/{product}', [ProductController::class, 'show']);
    Route::get('/admin', [AdminController::class, 'index']);

    Route::get('/cart', [CartController::class, 'showCart']);
    Route::post('/cart/addOrUpdate', [CartController::class, 'addToCart']);
    Route::get('/cart/remove/{product}', [CartController::class, 'removeFromCart']);

    Route::get('/checkout', [CartController::class, 'showCheckout']);
});


Auth::routes();
