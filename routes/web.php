<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect('/dashboard'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/device/{device}', [DeviceController::class, 'show'])->name('device.show');
    Route::get('/device/{device}/value', [DeviceController::class, 'deviceValue'])->name('device.value');
    Route::get('/device/{device}/quality', [DeviceController::class, 'valueQuality'])->name('device.quality');

    Route::get('/history/temperatures', [HistoryController::class, 'temperature'])->name('history.temperature');
    Route::get('/history/humidities', [HistoryController::class, 'humidity'])->name('history.humidity');
    Route::get('/history/values', [HistoryController::class, 'value'])->name('history.value');
});
