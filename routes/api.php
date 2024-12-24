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

Route::get('/login', [AuthController::class, 'login']);

// create operations
Route::post('/species-statuses/add', [SpeciesStatusController::class, 'store'])->middleware('auth:sanctum');
Route::post('/species-population-statuses/add', [SpeciesPopulationStatusController::class, 'store'])->middleware('auth:sanctum');
Route::post('/bird-orders/add', [BirdOrderController::class, 'store'])->middleware('auth:sanctum');
Route::post('/bird-families/add', [BirdFamilyController::class, 'store'])->middleware('auth:sanctum');
Route::post('/bird-genera/add', [BirdGenusController::class, 'store'])->middleware('auth:sanctum');
Route::post('/bird-species/add', [BirdSpeciesController::class, 'store'])->middleware('auth:sanctum');
Route::post('/bird-detections/add', [BirdDetectionController::class, 'store'])->middleware('auth:sanctum');
Route::post('/users/add', [UserController::class, 'store'])->middleware('auth:sanctum');
Route::post('/user-roles/add', [UserRoleController::class, 'store'])->middleware('auth:sanctum');

// retrieve operations 
Route::get('/species-statuses', [SpeciesStatusController::class, 'index']);
Route::get('/species-statuses/{id}', [SpeciesStatusController::class, 'show']);
Route::get('/species-population-statuses', [SpeciesPopulationStatusController::class, 'index']);
Route::get('/species-population-statuses/{id}', [SpeciesPopulationStatusController::class, 'show']);
Route::get('/bird-orders', [BirdOrderController::class, 'index']);
Route::get('/bird-orders/{id}', [BirdOrderController::class, 'show']);
Route::get('/bird-families', [BirdFamilyController::class, 'index']);
Route::get('/bird-families/{id}', [BirdFamilyController::class, 'show']);
Route::get('/bird-genera', [BirdGenusController::class, 'index']);
Route::get('/bird-genera/{id}', [BirdGenusController::class, 'show']);
Route::get('/bird-species', [BirdSpeciesController::class, 'index']);
Route::get('/bird-species/{id}', [BirdSpeciesController::class, 'show']);
Route::get('/bird-detections', [BirdDetectionController::class, 'index']);
Route::get('/bird-detections/{id}', [BirdDetectionController::class, 'show']);
Route::get('/users', [UserController::class, 'index'])->middleware('auth:sanctum');
Route::get('/users/{id}', [UserController::class, 'show'])->middleware('auth:sanctum');
Route::get('/user-roles', [UserRoleController::class, 'index'])->middleware('auth:sanctum');
Route::get('/user-roles/{id}', [UserRoleController::class, 'show'])->middleware('auth:sanctum');

// update operations
Route::put('/species-statuses/edit/{id}', [SpeciesStatusController::class, 'update'])->middleware('auth:sanctum');
Route::put('/species-population-statuses/edit/{id}', [SpeciesPopulationStatusController::class, 'update'])->middleware('auth:sanctum');
Route::put('/bird-orders/edit/{id}', [BirdOrderController::class, 'update'])->middleware('auth:sanctum');
Route::put('/bird-families/edit/{id}', [BirdFamilyController::class, 'update'])->middleware('auth:sanctum');
Route::put('/bird-genera/edit/{id}', [BirdGenusController::class, 'update'])->middleware('auth:sanctum');
Route::put('/bird-species/edit/{id}', [BirdSpeciesController::class, 'update'])->middleware('auth:sanctum');
Route::put('/bird-detections/edit/{id}', [BirdDetectionController::class, 'update'])->middleware('auth:sanctum');
Route::put('/users/edit/{id}', [UserController::class, 'update'])->middleware('auth:sanctum');
Route::put('/user-roles/edit/{id}', [UserRoleController::class, 'update'])->middleware('auth:sanctum');

// delete operations
Route::delete('/species-statuses/delete/{id}', [SpeciesStatusController::class, 'destroy'])->middleware('auth:sanctum');
Route::delete('/species-population-statuses/delete/{id}', [SpeciesPopulationStatusController::class, 'destroy'])->middleware('auth:sanctum');
Route::delete('/bird-orders/delete/{id}', [BirdOrderController::class, 'destroy'])->middleware('auth:sanctum');
Route::delete('/bird-families/delete/{id}', [BirdFamilyController::class, 'destroy'])->middleware('auth:sanctum');
Route::delete('/bird-genera/delete/{id}', [BirdGenusController::class, 'destroy'])->middleware('auth:sanctum');
Route::delete('/bird-species/delete/{id}', [BirdSpeciesController::class, 'destroy'])->middleware('auth:sanctum');
Route::delete('/bird-detections/delete/{id}', [BirdDetectionController::class, 'destroy'])->middleware('auth:sanctum');
Route::delete('/users/delete/{id}', [UserController::class, 'destroy'])->middleware('auth:sanctum');
Route::delete('/user-roles/delete/{id}', [UserRoleController::class, 'destroy'])->middleware('auth:sanctum');