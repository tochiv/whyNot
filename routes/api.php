<?php

use App\Http\Controllers\Api\Car\AvailableCarController;
use App\Http\Controllers\Api\Car\CarController;
use App\Http\Controllers\Api\Configuration\ConfigurationController;
use App\Http\Controllers\Api\Option\OptionController;
use App\Http\Controllers\Api\Price\PriceController;
use Illuminate\Support\Facades\Route;

Route::get('/cars/available', [AvailableCarController::class, 'index']);

Route::apiResource('cars', CarController::class);
Route::apiResource('options', OptionController::class);
Route::apiResource('prices', PriceController::class);
Route::apiResource('configurations', ConfigurationController::class);
