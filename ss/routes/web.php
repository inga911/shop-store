<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController as C;
use App\Http\Controllers\ProductController as P;
use App\Http\Controllers\FrontController as F;


Route::get('/', function () {
    return view('welcome');
})->name('front-index');


Route::name('front-')->group(function () {
    Route::get('/', [F::class, 'index'])->name('index');
    Route::get('/category/{cat}', [F::class, 'catColors'])->name('cat-colors');
    Route::get('/product/{product}', [F::class, 'showProduct'])->name('show-product');
    Route::get('/my-orders', [F::class, 'orders'])->name('orders');
    Route::get('/download/{order}', [F::class, 'download'])->name('download');
    Route::put('/vote/{product}', [F::class, 'vote'])->name('vote');
    Route::get('/tags-list', [F::class, 'getTagsList'])->name('tags-list');
    Route::put('/add-tag/{product}', [F::class, 'addTag'])->name('add-tag');
    Route::put('/delete-tag/{product}', [F::class, 'deleteTag'])->name('delete-tag');
    Route::post('/add-new-tag/{product}', [F::class, 'addNewTag'])->name('add-new-tag');
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
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
