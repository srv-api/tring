<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopUpController;

Route::get('/top-up', [TopUpController::class, 'index'])
    ->name('topup.index');

Route::get('/top-up/{game}', [TopUpController::class, 'show'])
    ->name('topup.show');