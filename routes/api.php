<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\Api\UserController;
use \App\Http\Controllers\Api\CategorieController;
use \App\Http\Controllers\Api\ArticleController;
use \App\Http\Controllers\Api\CommandeController;

// User management
Route::post('/users/signup', [UserController::class, 'signupAction']);
Route::post('/users/signin', [UserController::class, 'signinAction']);
Route::middleware('auth:sanctum')->get('/users/signout', [UserController::class, 'signoutAction']);
Route::middleware('auth:sanctum')->get('/users/profile/{id}', [UserController::class, 'getProfileAction']);
Route::middleware('auth:sanctum')->get('/users/refresh/{userId}', [UserController::class, 'refreshTokenAction']);

// Categories
Route::get('/categories', [CategorieController::class, 'getCategoriesAction']);
Route::middleware('auth:sanctum')->post('/categories', [CategorieController::class, 'saveCategorieAction']);
Route::middleware('auth:sanctum')->put('/categories', [CategorieController::class, 'updateCategorieAction']);
Route::middleware('auth:sanctum')->delete('/categories/{id}', [CategorieController::class, 'deleteCategorieAction'])->where('id', '[0-9]+');

// Articles
Route::get('/articles/by-categorie/{idCategorie}', [ArticleController::class, 'getArticlesByCategorieAction'])->where('idCategorie', '[0-9]+');
Route::middleware('auth:sanctum')->post('/articles', [ArticleController::class, 'saveArticleAction']);
Route::middleware('auth:sanctum')->put('/articles', [ArticleController::class, 'updateArticleAction']);
Route::middleware('auth:sanctum')->delete('/articles/{id}', [ArticleController::class, 'deleteCategorieAction'])->where('id', '[0-9]+');

// Commandes
Route::post('/commandes', [CommandeController::class, 'saveCommandeAction']);
Route::middleware('auth:sanctum')->put('/commandes/valider/{id}', [CommandeController::class, 'validerCommandeAction'])->where('id', '[0-9]+');
Route::middleware('auth:sanctum')->post('/commandes/list', [CommandeController::class, 'listCommandeAction']);
Route::middleware('auth:sanctum')->get('/commandes/detail/{id}', [CommandeController::class, 'detailCommandeAction'])->where('id', '[0-9]+');