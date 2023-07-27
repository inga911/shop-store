<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController as C;
use App\Http\Controllers\ProductController as P;


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('cats')->name('cats-')->group(function () {
    Route::get('/', [C::class, 'index'])->name('index');
    Route::get('/create', [C::class, 'create'])->name('create');
    Route::post('/create', [C::class, 'store'])->name('store');
    Route::get('/edit/{category}', [C::class, 'edit'])->name('edit');
    Route::put('/edit/{category}', [C::class, 'update'])->name('update');
    Route::delete('/delete/{category}', [C::class, 'destroy'])->name('delete');
});

Route::prefix('products')->name('products-')->group(function () {
    Route::get('/', [P::class, 'index'])->name('index');
    Route::get('/create', [P::class, 'create'])->name('create');
    Route::post('/create', [P::class, 'store'])->name('store');
    Route::get('/edit/{product}', [P::class, 'edit'])->name('edit');
    Route::put('/edit/{product}', [P::class, 'update'])->name('update');
    Route::delete('/delete/{product}', [P::class, 'destroy'])->name('delete');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
