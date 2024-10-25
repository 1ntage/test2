<?php

use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders', [OrderController::class, 'show']);

Route::get('/order', [OrderController::class, 'showOrderForm']);

Route::post('/order', [OrderController::class, 'store'])->name('make-order');

Route::post('/orders/{order}/accept', [OrderController::class, 'accept'])->name('orders.accept');
Route::post('/orders/{order}/cook', [OrderController::class, 'cook'])->name('orders.cook');
Route::post('/orders/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete');
