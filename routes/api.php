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

Route::post('/species-statuses/add', [SpeciesStatusController::class, 'store']);
Route::post('/species-population-statuses/add', [SpeciesPopulationStatusController::class, 'store']);
Route::post('/bird-orders/add', [BirdOrderController::class, 'store']);
Route::post('/bird-families/add', [BirdFamilyController::class, 'store']);
Route::post('/bird-genera/add', [BirdGenusController::class, 'store']);
Route::post('/bird-species/add', [BirdSpeciesController::class, 'store']);
Route::post('/bird-detections/add', [BirdDetectionController::class, 'store']);
Route::post('/users/add', [UserController::class, 'store']);
Route::post('/user-roles/add', [UserRoleController::class, 'store']);

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

Route::put('/species-statuses/update/{id}', [SpeciesStatusController::class, 'update']);
Route::put('/species-population-statuses/update/{id}', [SpeciesPopulationStatusController::class, 'update']);
Route::put('/bird-orders/update/{id}', [BirdOrderController::class, 'update']);
Route::put('/bird-families/update/{id}', [BirdFamilyController::class, 'update']);
Route::put('/bird-genera/update/{id}', [BirdGenusController::class, 'update']);
Route::put('/bird-species/update/{id}', [BirdSpeciesController::class, 'update']);
Route::put('/bird-detections/update/{id}', [BirdDetectionController::class, 'update']);
Route::put('/users/update/{id}', [UserController::class, 'update']);
Route::put('/user-roles/update/{id}', [UserRoleController::class, 'update']);

Route::delete('/species-statuses/delete/{id}', [SpeciesStatusController::class, 'destroy']);
Route::delete('/species-population-statuses/delete/{id}', [SpeciesPopulationStatusController::class, 'destroy']);
Route::delete('/bird-orders/delete/{id}', [BirdOrderController::class, 'destroy']);
Route::delete('/bird-families/delete/{id}', [BirdFamilyController::class, 'destroy']);
Route::delete('/bird-genera/delete/{id}', [BirdGenusController::class, 'destroy']);
Route::delete('/bird-species/delete/{id}', [BirdSpeciesController::class, 'destroy']);
Route::delete('/bird-detections/delete/{id}', [BirdDetectionController::class, 'destroy']);
Route::delete('/users/delete/{id}', [UserController::class, 'destroy']);
Route::delete('/user-roles/delete/{id}', [UserRoleController::class, 'destroy']);