<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\UserController;

//Route::apiResource("users", 'Api\UserController'); // Les routes "users.*" de l'API

Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);
Route::put('/users', [UserController::class, 'update']);
Route::delete('/users/{id}', [UserController::class, 'destroy']);