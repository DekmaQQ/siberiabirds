<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpeciesStatusController;
use App\Http\Controllers\SpeciesPopulationStatusController;
use App\Http\Controllers\BirdOrderController;
use App\Http\Controllers\BirdFamilyController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/species_statuses', [SpeciesStatusController::class, 'index']);
Route::get('/species_statuses/{id}', [SpeciesStatusController::class, 'show']);

Route::get('/species_population_statuses', [SpeciesPopulationStatusController::class, 'index']);
Route::get('/species_population_statuses/{id}', [SpeciesPopulationStatusController::class, 'show']);

Route::get('/bird_orders', [BirdOrderController::class, 'index']);
Route::get('/bird_orders/{id}', [BirdOrderController::class, 'show']);

# Route::get('/bird_families', [BirdFamilyController::class, 'index']);
Route::get('/bird_families/{id}', [BirdFamilyController::class, 'show']);