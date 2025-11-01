<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController;


Route::get('/', [BookingController::class, 'index'])->name('booking.index');
Route::post('/check', [BookingController::class, 'checkAvailability'])->name('booking.check');
Route::post('/confirm', [BookingController::class, 'confirm'])->name('booking.confirm');

