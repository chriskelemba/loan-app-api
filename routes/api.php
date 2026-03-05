<?php

use App\Http\Controllers\LoanController;
use App\Http\Controllers\ImportMaintenanceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('loans', LoanController::class);
Route::post('/imports/truncate', [ImportMaintenanceController::class, 'truncate']);
