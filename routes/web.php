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

Route::get('/', [HomeController::class, 'showIndex'])->name('home'); // Page d'accueil
Route::get('/aboutus', [HomeController::class, 'showAboutUs'])->name('home.about_us'); // Page à propos
Route::any('/contact', [HomeController::class, 'showContactUs'])->name('home.contact_us'); // Page de contact
Route::any('/contact/send', [HomeController::class, 'postContact'])->name('home.contact_us.send'); // Envoie un message de contact

Route::get('/products', [ProductController::class, 'showProducts'])->name('product.list'); // Liste des produits
Route::get('/product/{product}', [ProductController::class, 'showProduct'])->name('product.show'); // Détail d'un produit

Auth::routes();

Route::get('/login/google', [LoginController::class, 'redirectToGoogle'])->name('google.login'); // Affichage du "formulaire" de connexion de Google
Route::get('/callback/google', [LoginController::class, 'handleGoogleCallback'])->name('google.callback'); // Retour de connexion de Google

Route::middleware(['auth'])->group(function () {
    Route::any('/product/postReview', [ProductReviewController::class, 'postReview'])->name('product.postReview'); // Poste un avis sur un produit

    Route::get('/cart', [CartController::class, 'show'])->name('cart.show'); // Affiche le panier
    Route::post('/cart/add', [CartController::class, 'addOrUpdate'])->name('cart.add'); // Ajoute un produit au panier
    Route::post('/cart/update/quantity', [CartController::class, 'updateQuantity'])->name('cart.updateQuantity'); // Met à jour la quantité d'un produit dans le panier
    Route::any('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove'); // Retire un produit du panier
    Route::post('/cart/checkCoupon', [CartController::class, 'checkCoupon'])->name('cart.checkCoupon'); // Vérifie un coupon
    Route::get('/cart/removeCoupon', [CartController::class, 'removeCoupon'])->name('cart.removeCoupon'); // Retire un coupon


    Route::post('/checkout-validate', [CheckoutController::class, 'checkoutValidate'])->name('checkout.validate'); // Validation du panier

    Route::get('/profile', [ProfileController::class, 'showIndex'])->name('profile.index'); // Page de profil
    Route::post('/profile/save', [ProfileController::class, 'save'])->name('profile.save'); // Sauvegarde les informations du profil
    Route::get('/profile/orders-history', [ProfileController::class, 'showOrdersHistory'])->name('profile.orders_history'); // Historique des commandes
});


