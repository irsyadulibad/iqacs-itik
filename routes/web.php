<?php

use App\Http\Controllers\ControlController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('landing'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::get('/device/{device}', [DeviceController::class, 'show'])->name('device.show');
    Route::get('/device/{device}/value', [DeviceController::class, 'deviceValue'])->name('device.value');
    Route::get('/device/{device}/quality', [DeviceController::class, 'valueQuality'])->name('device.quality');

    Route::prefix('/history')->controller(HistoryController::class)
        ->name('history.')->group(function () {
            Route::get('/temperatures', 'temperature')->name('temperature');
            Route::get('/humidities', 'humidity')->name('humidity');
            Route::get('/ammonias', 'ammonia')->name('ammonia');
            Route::get('/values', 'value')->name('value');
            Route::get('/export', 'export')->name('export');
        });

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
