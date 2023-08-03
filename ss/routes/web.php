<?php

use App\Http\Controllers\CartController as CART;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController as C;
use App\Http\Controllers\ProductController as P;
use App\Http\Controllers\FrontController as F;
use App\Http\Controllers\OrderController as O;


Route::get('/', function () {
    return view('welcome');
})->name('front-index');


Route::name('front-')->group(function () {
    Route::get('/', [F::class, 'index'])->name('index');
    Route::get('/category/{category}', [F::class, 'singleCategory'])->name('single-category');
    Route::get('/product/{product}', [F::class, 'showProduct'])->name('show-product');
    Route::get('/my-orders', [F::class, 'orders'])->name('orders')->middleware('role:admin|client');
    Route::get('/download/{order}', [F::class, 'download'])->name('download')->middleware('role:admin|client');
    Route::put('/vote/{product}', [F::class, 'vote'])->name('vote')->middleware('role:admin|client');
    Route::get('/tags-list', [F::class, 'getTagsList'])->name('tags-list')->middleware('role:admin|client');
    Route::put('/add-tag/{product}', [F::class, 'addTag'])->name('add-tag')->middleware('role:admin|client');
    Route::put('/delete-tag/{product}', [F::class, 'deleteTag'])->name('delete-tag')->middleware('role:admin|client');
    Route::post('/add-new-tag/{product}', [F::class, 'addNewTag'])->name('add-new-tag')->middleware('role:admin|client');
});

Route::prefix('cart-')->name('cart-')->group(function () {
    Route::put('/add', [CART::class, 'add'])->name('add');
    Route::put('/remove', [CART::class, 'remove'])->name('remove');
    Route::put('/update', [CART::class, 'update'])->name('update');
    Route::post('/buy', [CART::class, 'buy'])->name('buy');
    Route::get('/', [CART::class, 'showCart'])->name('show');
    Route::get('/mini-cart', [CART::class, 'miniCart'])->name('mini-cart');
});

Route::prefix('cats')->name('cats-')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index')->middleware('role:admin');
    Route::get('/create', [C::class, 'create'])->name('create')->middleware('role:admin');
    Route::post('/create', [C::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('/edit/{category}', [C::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('/edit/{category}', [C::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('/delete/{category}', [C::class, 'destroy'])->name('delete')->middleware('role:admin');
})->middleware('role:admin');

Route::prefix('products')->name('products-')->group(function () {
    Route::get('/', [P::class, 'index'])->name('index')->middleware('role:admin');
    Route::get('/create', [P::class, 'create'])->name('create')->middleware('role:admin');
    Route::post('/create', [P::class, 'store'])->name('store')->middleware('role:admin');
    Route::get('/edit/{product}', [P::class, 'edit'])->name('edit')->middleware('role:admin');
    Route::put('/edit/{product}', [P::class, 'update'])->name('update')->middleware('role:admin');
    Route::delete('/delete/{product}', [P::class, 'destroy'])->name('delete')->middleware('role:admin');
    Route::delete('/delete-photo/{photo}', [P::class, 'destroyPhoto'])->name('delete-photo')->middleware('role:admin');
});

Route::prefix('orders')->name('orders-')->group(function () {
    Route::get('/', [O::class, 'index'])->name('index')->middleware('role:admin');
    Route::put('/status/{order}', [O::class, 'update'])->name('update')->middleware('role:admin');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
