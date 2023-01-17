<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\TransactionController;

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

// Main Page
Route::get('/', [WebController::class, 'index'])->name('index');

// Register Page
Route::get('/auth/register', [UserController::class, 'index_register'])->middleware('guestMiddleware')->name('index_register');
Route::post('/auth/register', [UserController::class, 'register'])->middleware('guestMiddleware')->name('register');

// Login Page
Route::get('/auth/login', [LoginController::class, 'index_login'])->middleware('guestMiddleware')->name('index_login');
Route::post('/auth/login', [LoginController::class, 'login'])->middleware('guestMiddleware')->name('login');
Route::post('/auth/logout', [LoginController::class, 'logout'])->middleware('authenticatedMiddleware')->name('logout');

// Profile Page
Route::get('/profile', [UserController::class, 'show'])->middleware('authenticatedMiddleware')->name('show_profile');
Route::get('/profile/edit', [UserController::class, 'edit_page'])->middleware('authenticatedMiddleware')->name('edit_profile');
Route::post('/profile/edit', [UserController::class, 'update_profile'])->middleware('authenticatedMiddleware')->name('update_profile');

// Product
Route::get('/product/add', [ProductController::class, 'add_page'])->middleware('adminMiddleware')->name('add_page');
Route::post('/product/add', [ProductController::class, 'add'])->middleware('adminMiddleware')->name('product_add');
Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->middleware('adminMiddleware')->name('edit_product');
Route::post('product/edit/{id}', [ProductController::class, 'update'])->middleware('adminMiddleware')->name('product_edit');
Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->middleware('adminMiddleware')->name('product_delete');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product_detail');
Route::get('/manage/product', [ProductController::class, 'manage'])->middleware('adminMiddleware')->name('manage_product');
Route::get('/search', [ProductController::class, 'search'])->name('product_search');

// Cart
Route::get('/cart', [CartController::class, 'index'])->middleware('memberMiddleware')->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->middleware('memberMiddleware')->name('add_cart');
Route::get('/cart/edit/{id}', [CartController::class, 'edit'])->middleware('memberMiddleware')->name('edit_cart');
Route::post('/cart/edit/{id}', [CartController::class, 'update'])->middleware('memberMiddleware')->name('update_cart');
Route::delete('/cart/delete/{id}', [CartController::class, 'delete'])->middleware('memberMiddleware')->name('remove_cart');

// Transaction
Route::get('/transaction', [TransactionController::class, 'index'])->middleware('memberMiddleware')->name('history');
Route::post('/cart/checkout', [TransactionController::class, 'checkout'])->middleware('memberMiddleware')->name('checkout');

