<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\{
    SpeciesStatusController,
    SpeciesPopulationStatusController,
    BirdOrderController,
    BirdFamilyController,
    BirdGenusController,
    BirdSpeciesController,
    BirdDetectionController,
    UserController,
    UserRoleController,
    AuthController
};

// endpoint to get bearer token
Route::get('/login', [AuthController::class, 'login']);

// get all BirdDetection
Route::get('/bird-detections', [BirdDetectionController::class, 'index']);
// get a specific BirdDetection
Route::get('/bird-detections/{birdDetection}', [BirdDetectionController::class, 'show']);

// get all BirdFamily
Route::get('/bird-families', [BirdFamilyController::class, 'index']);
// get a specific BirdFamily
Route::get('/bird-families/{birdFamily}', [BirdFamilyController::class, 'show']);

// get all BirdGenus
Route::get('/bird-genera', [BirdGenusController::class, 'index']);
// get a specific BirdGenus
Route::get('/bird-genera/{birdGenus}', [BirdGenusController::class, 'show']);

// get all BirdOrder
Route::get('/bird-orders', [BirdOrderController::class, 'index']);
// get a specific BirdOrder
Route::get('/bird-orders/{birdOrder}', [BirdOrderController::class, 'show']);

// get all BirdSpecies
Route::get('/bird-species', [BirdSpeciesController::class, 'index']);
// get a specific BirdSpecies
Route::get('/bird-species/{birdSpecies}', [BirdSpeciesController::class, 'show']);

// get all SpeciesPopulationStatus
Route::get('/species-population-statuses', [SpeciesPopulationStatusController::class, 'index']);
// get a specific SpeciesPopulationStatus
Route::get('/species-population-statuses/{speciesPopulationStatus}', [SpeciesPopulationStatusController::class, 'show']);

// get all SpeciesStatus
Route::get('/species-statuses', [SpeciesStatusController::class, 'index']);
// get a specific SpeciesStatus
Route::get('/species-statuses/{speciesStatus}', [SpeciesStatusController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    // endpoints of BirdDetection
    Route::post('/bird-detections/add', [BirdDetectionController::class, 'store']);
    Route::put('/bird-detections/edit/{birdDetection}', [BirdDetectionController::class, 'update']);
    Route::delete('/bird-detections/delete/{birdDetection}', [BirdDetectionController::class, 'destroy']);

    // endpoints of BirdFamily
    Route::post('/bird-families/add', [BirdFamilyController::class, 'store']);
    Route::put('/bird-families/edit/{birdFamily}', [BirdFamilyController::class, 'update']);
    Route::delete('/bird-families/delete/{birdFamily}', [BirdFamilyController::class, 'destroy']);

    // endpoints of BirdGenus
    Route::post('/bird-genera/add', [BirdGenusController::class, 'store']);
    Route::put('/bird-genera/edit/{birdGenus}', [BirdGenusController::class, 'update']);
    Route::delete('/bird-genera/delete/{birdGenus}', [BirdGenusController::class, 'destroy']);

    // endpoints of BirdOrder
    Route::post('/bird-orders/add', [BirdOrderController::class, 'store']);
    Route::put('/bird-orders/edit/{birdOrder}', [BirdOrderController::class, 'update']);
    Route::delete('/bird-orders/delete/{birdOrder}', [BirdOrderController::class, 'destroy']);

    // endpoints of BirdSpecies
    Route::post('/bird-species/add', [BirdSpeciesController::class, 'store']);
    Route::put('/bird-species/edit/{birdSpecies}', [BirdSpeciesController::class, 'update']);
    Route::delete('/bird-species/delete/{birdSpecies}', [BirdSpeciesController::class, 'destroy']);

    // endpoints of SpeciesPopulationStatus
    Route::post('/species-population-statuses/add', [SpeciesPopulationStatusController::class, 'store']);
    Route::put('/species-population-statuses/edit/{speciesPopulationStatus}', [SpeciesPopulationStatusController::class, 'update']);
    Route::delete('/species-population-statuses/delete/{speciesPopulationStatus}', [SpeciesPopulationStatusController::class, 'destroy']);

    // endpoints of SpeciesStatus
    Route::post('/species-statuses/add', [SpeciesStatusController::class, 'store']);
    Route::put('/species-statuses/edit/{speciesStatus}', [SpeciesStatusController::class, 'update']);
    Route::delete('/species-statuses/delete/{speciesStatus}', [SpeciesStatusController::class, 'destroy']);

    // endpoints of User
    Route::post('/users/add', [UserController::class, 'store']);
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/users/{user}', [UserController::class, 'show']);
    Route::put('/users/edit/{user}', [UserController::class, 'update']);
    Route::delete('/users/delete/{user}', [UserController::class, 'destroy']);

    // endpoints of UserRole
    Route::post('/user-roles/add', [UserRoleController::class, 'store']);
    Route::get('/user-roles', [UserRoleController::class, 'index']);
    Route::get('/user-roles/{userRole}', [UserRoleController::class, 'show']);
    Route::put('/user-roles/edit/{userRole}', [UserRoleController::class, 'update']);
    Route::delete('/user-roles/delete/{userRole}', [UserRoleController::class, 'destroy']);
});