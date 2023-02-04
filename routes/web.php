<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/penulis.ukm.um/dashboard', function() {
    return view('dashboard/dashboard');
});

Auth::routes();
Route::middleware(['admin'])->group(function() {
    Route::delete('/product/{product}', [ProductController::class, 'delete_product'])->name('delete_product');
    Route::get('/product/create', [ProductController::class, 'create_product'])->name('create_product');
    Route::post('/product/create', [ProductController::class, 'store_product'])->name('store_product');
    Route::get('/product/{product}/edit', [ProductController::class, 'edit_product'])->name('edit_product');
    Route::patch('/product/{product}/update', [ProductController::class, 'update_product'])->name('update_product');
    
    Route::get('/order', [OrderController::class, 'index_order'])->name('index_order');
    Route::post('/order/{order}/Confirm', [OrderController::class, 'confirm_payment'])->name('confirm_payment');
});

Route::middleware(['auth'])->group(function() {
    Route::get('/product', [ProductController::class, 'index_product'])->name('index_product');
    Route::get('/product/{product}', [ProductController::class, 'show_product'])->name('show_product');
    
    Route::post('/cart/{product}', [CartController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('/cart', [CartController::class, 'show_cart'])->name('show_cart');
    Route::patch('/cart/{cart}', [CartController::class, 'update_cart'])->name('update_cart');
    Route::delete('/cart/{cart}', [CartController::class, 'delete_cart'])->name('delete_cart');
    
    Route::post('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    
    Route::get('/order/{order}', [OrderController::class, 'show_order'])->name('show_order');
    Route::post('/order/{order}/pay', [OrderController::class, 'submit_payment_receipt'])->name('submit_payment_receipt');
    
    Route::get('/profile', [UserController::class, 'show_profile'])->name('show_profile');
    Route::get('/profile/{user}/edit', [UserController::class, 'edit_profile'])->name('edit_profile');
    Route::post('/profile/{user}/edit', [UserController::class, 'update_profile'])->name('update_profile');

    Route::get('/alamat', [UserController::class, 'alamat'])->name('alamat');
    Route::get('/alamat/{user}/edit', [UserController::class, 'edit_alamat'])->name('edit_alamat');
    Route::post('/alamat/{user}/edit', [UserController::class, 'update_alamat'])->name('update_alamat');
});