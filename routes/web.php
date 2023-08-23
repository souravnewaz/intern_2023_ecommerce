<?php

use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Cartcontroller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware('guest')->group(function(){
    Route::get('login', [LoginController::class, 'show']);
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'show']);
    Route::post('register', [RegisterController::class, 'register']);
});

Route::middleware('auth')->group(function(){
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('/carts', [Cartcontroller::class, 'index'])->name('carts.index');
    Route::get('/carts/store/{product}', [Cartcontroller::class, 'store'])->name('carts.store');
    Route::get('/carts/delete/{cart}', [Cartcontroller::class, 'delete'])->name('carts.delete');
    Route::get('/checkout', [Cartcontroller::class, 'checkout'])->name('checkout');

    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
});

Route::prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/orders', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('admin.orders');
    Route::post('/orders/update-status', [\App\Http\Controllers\Admin\OrderController::class, 'updateStatus'])->name('admin.updateStatus');
    
    Route::get('/products', [ProductController::class, 'index'])->name('admin.products');
    Route::get('/products/create', [ProductController::class, 'create'])->name('admin.products.create');
    Route::post('/products/create', [ProductController::class, 'store']);
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('admin.products.edit');
    Route::post('/products/{product}/edit', [ProductController::class, 'update']);

    Route::get('/customers', [CustomerController::class, 'index'])->name('admin.customers');
});