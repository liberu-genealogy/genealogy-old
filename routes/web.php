<?php

use App\Http\Controllers\Trees\Gift;
use Illuminate\Support\Facades\Route;

Route::get('/trees/gift/create', [Gift::class, 'createOrder'])->name('gift.create.order');
Route::get('/trees/gift/order/{orderId}', [Gift::class, 'getOrder'])->name('gift.get.order');
Route::get('/trees/gift/order/{orderId}/shipping', [Gift::class, 'getShippingAddress'])->name('gift.get.shipping');

Route::view('/{any}', 'index')->where('any', '.*');
