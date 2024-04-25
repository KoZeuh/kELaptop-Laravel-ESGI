<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
Route::get('/aboutus', [App\Http\Controllers\HomeController::class, 'aboutUs']);
Route::get('/product/list', [ProductController::class, 'list']);
Route::get('/product/show/{product}', [ProductController::class, 'show']);

Route::middleware(['auth'])->group(function () {
    Route::get('/contact', [App\Http\Controllers\HomeController::class, 'contactUs']);
    Route::get('/checkout', [CartController::class, 'showCheckout']);
    
    Route::post('/cart/addOrUpdate', [CartController::class, 'addToCart']);
    Route::post('/cart/updateQty', [CartController::class, 'updateQty']);
    Route::get('/cart/remove/{product}', [CartController::class, 'removeFromCart']);

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile/save', [ProfileController::class, 'save']);

    Route::get('/admin', [AdminController::class, 'index']);
});


Auth::routes();
