<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\Auth\LoginController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/aboutus', [HomeController::class, 'aboutUs']);
Route::any('/contact', [HomeController::class, 'contactUs']);

Route::get('/product/list', [ProductController::class, 'list']);
Route::get('/product/show/{product}', [ProductController::class, 'show']);

Auth::routes();

Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('google.login');
Route::get('/callback/google', [LoginController::class, 'handleGoogleCallback'])->name('google.callback');

Route::middleware(['auth'])->group(function () {
    Route::any('/product/review/', [ProductReviewController::class, 'postReview']);
    Route::any('/contact/send', [HomeController::class, 'sendContact']);

    Route::get('/cart', [CartController::class, 'show']);
    Route::post('/cart/checkCoupon', [CartController::class, 'checkCoupon']);
    Route::get('/cart/removeCoupon', [CartController::class, 'removeCoupon']);

    Route::post('/checkout-validate', [CheckoutController::class, 'checkoutValidate']);
    
    Route::post('/cart/addOrUpdate', [CartController::class, 'addToCart']);
    Route::post('/cart/updateQty', [CartController::class, 'updateQty']);
    Route::any('/cart/remove/{product}', [CartController::class, 'removeFromCart']);

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile/save', [ProfileController::class, 'save']);

    Route::get('/profile/orders-history', [ProfileController::class, 'ordersHistory']);

    Route::get('/admin', [AdminController::class, 'index']);
});


