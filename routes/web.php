<?php

use App\Http\Controllers\AboutusController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDetailController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\WishlistController;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// ALL USER ACCESS
Route::redirect('/', '/home');
Route::get('/home', [HomeController::class, 'showHome'])->name('home.list');
Route::get('/category/{categoryId}', [ProductController::class, 'showProductCategory'])->name('category');
Route::get('/aboutus', [AboutusController::class, 'showCategoryAboutus'])->name('aboutus');

// GUEST ONLY
Route::middleware('guest')->group(function() {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    // LOGGED IN ONLY
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/profile', [ProfileController::class, 'showUserData'])->name('profile');

    Route::get('/category/{category_id}', [ProductController::class , 'showProductCategory']);
    Route::get('/product/details/{productId}', [ProductDetailController::class, 'getProductDetails'])->name('productDetail');


    // CUSTOMER SECTION HERE
    Route::middleware('customer')->group(function () {
        Route::get('/cart', [CartController::class, 'showShoppingCart'])->name('shoppingcart');
        Route::post('/cart/add/{id}', [CartController::class, 'addToCart']);
        Route::put('cart/update/{id}', [CartController::class, 'updateCart']);
        Route::delete('/cart/delete/{id}', [CartController::class, 'removeCart']);
        Route::delete('/cart/clear', [CartController::class, 'clearAllCart']);
        Route::get('/checkout', [CartController::class, 'showCheckoutPage'])->name('checkout');
        Route::post('/checkout', [CartController::class, 'checkOut'])->name('checkout');

        Route::get('/transaction/{product_id}', [HomeController::class, 'showTransaction']);
        Route::get('/transaction-history', [TransactionController::class, 'showCategorytransactionHistory'])->name('transaction-history');

        Route::get('/wishlist', [WishlistController::class, 'showWishlist'])->name('wishlist');
        Route::post('/wishlist/add/{id}', [WishlistController::class, 'addToWishlist']);
        Route::delete('/wishlist/delete/{id}', [WishlistController::class, 'deleteWishlist']);
        Route::delete('/wishlist/deleteByProduct/{id}', [WishlistController::class, 'deleteWishlistByProductId']);
    });


    // ADMIN SECTION HERE
    Route::middleware('admin')->group(function() {
        Route::get('/admin', [ProfileController::class, 'showCategoryAdmin'])->name('admin');
        Route::get('/add-product', [ProductController::class, 'showAddProductPage'])->name('addProductPage');
        Route::post('/add-product', [ProductController::class, 'addProduct']);
        Route::put('/product/updateQty/{id}', [ProductController::class, 'updateQty']);
        Route::delete('/product/delete/{id}', [ProductController::class, 'deleteProduct']);
    });
});

Route::get('/update-product', function(){
    return view('updateProduct');
})->name('updateProduct');

Route::get('/update-product/{product_id}', function(){
    return view('updateProductDetail');
})->name('updateProductDetail');
