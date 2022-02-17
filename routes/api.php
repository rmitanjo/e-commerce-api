<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Api\UserController;

Route::post('/users/signup', [UserController::class, 'signupAction']);
Route::post('/users/signin', [UserController::class, 'signinAction']);
Route::middleware('auth:sanctum')->get('/users/signout', [UserController::class, 'signoutAction']);
Route::middleware('auth:sanctum')->get('/users/profile/{id}', [UserController::class, 'getProfileAction']);
Route::middleware('auth:sanctum')->get('/users/refresh/{userId}', [UserController::class, 'refreshTokenAction']);