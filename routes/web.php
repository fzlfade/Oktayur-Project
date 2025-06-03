<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SellerController;

Route::get('/', function () {
    return view('landing');
});
// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard-penjual');
// });

Route::get('/dashboard', function () {
    return view('dashboard-penjual');
})->middleware('auth')->name('dashboard-penjual');

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/produk', [ProductController::class, 'customerIndex'])->name('products.customer.index');
Route::get('/produk/{product}', [ProductController::class, 'customerShow'])->name('products.customer.show');

Route::middleware('auth')->group(function () {
    //Seller Routes
    Route::get('/pengaturan', [SellerController::class, 'edit'])->name('seller.edit');
    Route::put('/pengaturan/{user}', [SellerController::class, 'update'])->name('seller.update');
    Route::delete('/pengaturan/{user}', [SellerController::class, 'destroy'])->name('seller.destroy');
    
    //Product Routes
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductController::class, 'store'])->name('products.store');
    Route::delete('/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::get('/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductController::class, 'update'])->name('products.update');

});