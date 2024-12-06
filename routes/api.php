<?php

use App\Http\Controllers\Api\ControlController;
use App\Http\Controllers\Api\StatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/stats/charts', [StatController::class, 'charts'])->name('api.stats.charts');
Route::get('/stats/{device}', [StatController::class, 'index'])->name('api.stats');

Route::prefix('/control')->controller(ControlController::class)
    ->name('control.')->group(function () {
        Route::get('states', 'states')->name('states');
        Route::post('manual', 'manual')->name('manual');
        Route::post('auto', 'auto')->name('auto');
        Route::delete('auto/{device}', 'autoDelete')->name('delete');
    });

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
