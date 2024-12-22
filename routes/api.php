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

Route::post('/register', [AuthController::class, 'register'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login'])->middleware('auth:sanctum');
Route::get('/check-token', [AuthController::class, 'checkToken'])->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

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
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::get('/user-roles', [UserRoleController::class, 'index']);
Route::get('/user-roles/{id}', [UserRoleController::class, 'show']);

Route::delete('/species-statuses/delete/{id}', [SpeciesStatusController::class, 'destroy']);
Route::delete('/species-population-statuses/delete/{id}', [SpeciesPopulationStatusController::class, 'destroy']);
Route::delete('/bird-orders/delete/{id}', [BirdOrderController::class, 'destroy']);
Route::delete('/bird-families/delete/{id}', [BirdFamilyController::class, 'destroy']);
Route::delete('/bird-genera/delete/{id}', [BirdGenusController::class, 'destroy']);
Route::delete('/bird-species/delete/{id}', [BirdSpeciesController::class, 'destroy']);
Route::delete('/bird-detections/delete/{id}', [BirdDetectionController::class, 'destroy']);
Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);
Route::delete('/user-roles/delete/{id}', [UserRoleController::class, 'destroy']);