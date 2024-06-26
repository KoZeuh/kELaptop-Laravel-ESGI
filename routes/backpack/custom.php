<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('brand', 'BrandCrudController');
    Route::crud('category', 'CategoryCrudController');
    Route::crud('order', 'OrderCrudController');
    Route::crud('order-item', 'OrderItemCrudController');
    Route::crud('product', 'ProductCrudController');
    Route::crud('product-image', 'ProductImageCrudController');
    Route::crud('product-review', 'ProductReviewCrudController');
    Route::crud('promo-code', 'PromoCodeCrudController');
    Route::crud('stock', 'StockCrudController');
    Route::crud('user', 'UserCrudController');
    Route::crud('cart', 'CartCrudController');
}); // this should be the absolute last line of this file