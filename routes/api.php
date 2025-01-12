<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SpeciesStatusController;
use App\Http\Controllers\Api\SpeciesPopulationStatusController;
use App\Http\Controllers\Api\BirdOrderController;
use App\Http\Controllers\Api\BirdFamilyController;
use App\Http\Controllers\Api\BirdGenusController;
use App\Http\Controllers\Api\BirdSpeciesController;
use App\Http\Controllers\Api\BirdDetectionController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\UserRoleController;
use App\Http\Controllers\Api\AuthController;

// endpoint to get bearer token
Route::get('/login', [AuthController::class, 'login']);

// endpoints of BirdDetection
Route::post('/bird-detections/add', [BirdDetectionController::class, 'store'])->middleware('auth:sanctum');
Route::get('/bird-detections', [BirdDetectionController::class, 'index']);
Route::get('/bird-detections/{birdDetection}', [BirdDetectionController::class, 'show']);
Route::put('/bird-detections/edit/{birdDetection}', [BirdDetectionController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/bird-detections/delete/{birdDetection}', [BirdDetectionController::class, 'destroy'])->middleware('auth:sanctum');

// endpoints of BirdFamily
Route::post('/bird-families/add', [BirdFamilyController::class, 'store'])->middleware('auth:sanctum');
Route::get('/bird-families', [BirdFamilyController::class, 'index']);
Route::get('/bird-families/{birdFamily}', [BirdFamilyController::class, 'show']);
Route::put('/bird-families/edit/{birdFamily}', [BirdFamilyController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/bird-families/delete/{birdFamily}', [BirdFamilyController::class, 'destroy'])->middleware('auth:sanctum');

// endpoints of BirdGenus
Route::post('/bird-genera/add', [BirdGenusController::class, 'store'])->middleware('auth:sanctum');
Route::get('/bird-genera', [BirdGenusController::class, 'index']);
Route::get('/bird-genera/{birdGenus}', [BirdGenusController::class, 'show']);
Route::put('/bird-genera/edit/{birdGenus}', [BirdGenusController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/bird-genera/delete/{birdGenus}', [BirdGenusController::class, 'destroy'])->middleware('auth:sanctum');

// endpoints of BirdOrder
Route::post('/bird-orders/add', [BirdOrderController::class, 'store'])->middleware('auth:sanctum');
Route::get('/bird-orders', [BirdOrderController::class, 'index']);
Route::get('/bird-orders/{birdOrder}', [BirdOrderController::class, 'show']);
Route::put('/bird-orders/edit/{birdOrder}', [BirdOrderController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/bird-orders/delete/{birdOrder}', [BirdOrderController::class, 'destroy'])->middleware('auth:sanctum');

// endpoints of BirdSpecies
Route::post('/bird-species/add', [BirdSpeciesController::class, 'store'])->middleware('auth:sanctum');
Route::get('/bird-species', [BirdSpeciesController::class, 'index']);
Route::get('/bird-species/{birdSpecies}', [BirdSpeciesController::class, 'show']);
Route::put('/bird-species/edit/{birdSpecies}', [BirdSpeciesController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/bird-species/delete/{birdSpecies}', [BirdSpeciesController::class, 'destroy'])->middleware('auth:sanctum');

// endpoints of SpeciesPopulationStatus
Route::post('/species-population-statuses/add', [SpeciesPopulationStatusController::class, 'store'])->middleware('auth:sanctum');
Route::get('/species-population-statuses', [SpeciesPopulationStatusController::class, 'index']);
Route::get('/species-population-statuses/{speciesPopulationStatus}', [SpeciesPopulationStatusController::class, 'show']);
Route::put('/species-population-statuses/edit/{id}', [SpeciesPopulationStatusController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/species-population-statuses/delete/{id}', [SpeciesPopulationStatusController::class, 'destroy'])->middleware('auth:sanctum');

// endpoints of SpeciesStatus
Route::post('/species-statuses/add', [SpeciesStatusController::class, 'store'])->middleware('auth:sanctum');
Route::get('/species-statuses', [SpeciesStatusController::class, 'index']);
Route::get('/species-statuses/{speciesStatus}', [SpeciesStatusController::class, 'show']);
Route::put('/species-statuses/edit/{speciesStatus}', [SpeciesStatusController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/species-statuses/delete/{speciesStatus}', [SpeciesStatusController::class, 'destroy'])->middleware('auth:sanctum');

// endpoints of User
Route::post('/users/add', [UserController::class, 'store'])->middleware('auth:sanctum');
Route::get('/users', [UserController::class, 'index'])->middleware('auth:sanctum');
Route::get('/users/{user}', [UserController::class, 'show'])->middleware('auth:sanctum');
Route::put('/users/edit/{user}', [UserController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/users/delete/{user}', [UserController::class, 'destroy'])->middleware('auth:sanctum');

// endpoints of UserRole
Route::post('/user-roles/add', [UserRoleController::class, 'store'])->middleware('auth:sanctum');
Route::get('/user-roles', [UserRoleController::class, 'index'])->middleware('auth:sanctum');
Route::get('/user-roles/{userRole}', [UserRoleController::class, 'show'])->middleware('auth:sanctum');
Route::put('/user-roles/edit/{userRole}', [UserRoleController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/user-roles/delete/{userRole}', [UserRoleController::class, 'destroy'])->middleware('auth:sanctum');