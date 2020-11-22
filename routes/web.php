<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('shop', [ShopController::class, 'index'])->name('shop.index');
Route::get('shop/{product}', [ShopController::class, 'show'])->name('shop.show');


Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart', [CartController::class, 'store'])->name('cart.store');
Route::delete('cart', [CartController::class, 'remove'])->name('cart.remove');
