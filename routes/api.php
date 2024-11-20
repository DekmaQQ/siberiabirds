<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SpeciesStatusController;
use App\Http\Controllers\SpeciesPopulationStatusController;
use App\Http\Controllers\BirdOrderController;
use App\Http\Controllers\BirdFamilyController;
use App\Http\Controllers\BirdGenusController;
use App\Http\Controllers\BirdSpeciesController;
use App\Http\Controllers\BirdDetectionController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/species_statuses', [SpeciesStatusController::class, 'index']);
Route::get('/species_statuses/{id}', [SpeciesStatusController::class, 'show']);

Route::get('/species_population_statuses', [SpeciesPopulationStatusController::class, 'index']);
Route::get('/species_population_statuses/{id}', [SpeciesPopulationStatusController::class, 'show']);

Route::get('/bird_orders', [BirdOrderController::class, 'index']);
Route::get('/bird_orders/{id}', [BirdOrderController::class, 'show']);

Route::get('/bird_families', [BirdFamilyController::class, 'index']);
Route::get('/bird_families/{id}', [BirdFamilyController::class, 'show']);

Route::get('/bird_genera', [BirdGenusController::class, 'index']);
Route::get('/bird_genera/{id}', [BirdGenusController::class, 'show']);

Route::get('/bird_species', [BirdSpeciesController::class, 'index']);
Route::get('/bird_species/{id}', [BirdSpeciesController::class, 'show']);

Route::get('/bird_detections', [BirdDetectionController::class, 'index']);
Route::get('/bird_detections/{id}', [BirdDetectionController::class, 'show']);