<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/product/show/{product}', [App\Http\Controllers\ProductController::class, 'show']);
    Route::get('/admin', [AdminController::class, 'index']);
});


Auth::routes();
