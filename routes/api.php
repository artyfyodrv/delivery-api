<?php

use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\OrdersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('v1/orders/create', [OrdersController::class, 'create'])->name('order-create');
Route::get('v1/orders/get/{id}', [OrdersController::class, 'get'])->name('order-get');
Route::get('v1/orders/list', [OrdersController::class, 'list'])->name('order-list');
Route::get('v1/delivery/order/{id}', [DeliveryController::class, 'orderInfo'])->name('delivery-order');
