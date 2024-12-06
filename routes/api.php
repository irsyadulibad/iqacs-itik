<?php

use App\Http\Controllers\Api\StatController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/stats/charts', [StatController::class, 'charts'])->name('api.stats.charts');
Route::get('/stats/{device}', [StatController::class, 'index'])->name('api.stats');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
