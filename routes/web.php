<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\Auth\LoginController;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::get('/', [TopUpController::class, 'index'])
    ->name('home');


/*
|--------------------------------------------------------------------------
| AUTH
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'showLoginForm'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| TOP UP
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Daftar Top Up
|--------------------------------------------------------------------------
|
| Penting:
| Route ini diperlukan agar:
|
| route('topup.index')
|
| bisa digunakan di Blade.
|
*/

Route::get('/topup', [TopUpController::class, 'index'])
    ->name('topup.index');


/*
|--------------------------------------------------------------------------
| Detail Game
|--------------------------------------------------------------------------
*/

Route::get('/topup/{game}', [TopUpController::class, 'show'])
    ->name('topup.show');


/*
|--------------------------------------------------------------------------
| Cek ID Mobile Legends
|--------------------------------------------------------------------------
*/

Route::post('/topup/check-mlbb', [TopUpController::class, 'checkMlbb'])
    ->name('topup.check.mlbb');


/*
|--------------------------------------------------------------------------
| Create Order
|--------------------------------------------------------------------------
*/

Route::post('/topup/order', [TopUpController::class, 'createOrder'])
    ->name('topup.order');


/*
|--------------------------------------------------------------------------
| Payment
|--------------------------------------------------------------------------
*/

Route::get('/topup/payment/{orderId}', [
    TopUpController::class,
    'payment'
])->name('topup.payment');


/*
|--------------------------------------------------------------------------
| Testing Payment Success
|--------------------------------------------------------------------------
*/

Route::get('/topup/payment/{orderId}/success', [
    TopUpController::class,
    'paymentSuccess'
])->name('topup.payment.success');


/*
|--------------------------------------------------------------------------
| Result
|--------------------------------------------------------------------------
*/

Route::get('/topup/result/{orderId}', [
    TopUpController::class,
    'result'
])->name('topup.result');


/*
|--------------------------------------------------------------------------
| Midtrans Notification
|--------------------------------------------------------------------------
*/

Route::post('/midtrans/notification', [
    TopUpController::class,
    'midtransNotification'
])->name('midtrans.notification');

