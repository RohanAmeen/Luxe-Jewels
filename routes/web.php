<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;


Route::controller(WebController::class)->group(function () {
    Route::get('', 'index')->name('home');
    Route::get('/shop', 'shop')->name('shop');
    Route::get('/about', 'about')->name('about');
    Route::get('/blog', 'blog')->name('blog');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/services', 'services')->name('services');
    Route::get('/cart', 'cart')->name('cart');
    Route::get('/productDetail{product}', 'productDetail')->name('productDetail');

});



Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [ProductController::class, 'index'])->name('dashboard'); // Home dashboard
    Route::get('/dashboard/products/create', [ProductController::class, 'create'])->name('products.create'); // Add new movie form
    Route::post('/dashboard/products', [ProductController::class, 'store'])->name('products.store'); // Store movie
    Route::get('/dashboard/products/{product}/edit', [ProductController::class, 'edit'])->name('products.edit'); // Edit movie
    Route::put('/dashboard/products/{product}', [ProductController::class, 'update'])->name('products.update'); // Update movie
    Route::delete('/dashboard/products/{product}', [ProductController::class, 'destroy'])->name('products.destroy'); // Delete movie
    Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

    Route::get('/dashboard/categories', [CategoryController::class, 'index'])->name('categories.index'); // Show all categories
    Route::get('/dashboard/categories/create', [CategoryController::class, 'create'])->name('categories.create'); // Add new category form
    Route::post('/dashboard/categories', [CategoryController::class, 'store'])->name('categories.store'); // Store category
    Route::get('/dashboard/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit'); // Edit category
    Route::put('/dashboard/categories/{category}', [CategoryController::class, 'update'])->name('categories.update'); // Update category
    Route::delete('/dashboard/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
