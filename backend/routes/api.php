<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\FavoriteController;

Route::get('/servers', [ServerController::class, 'index']);
Route::get('/categories', [CategoryController::class, 'index']);
Route::middleware('auth:sanctum')->get('/user', [FavoriteController::class, 'getUserFavorites']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::post('/servers/{server}/rate', [RatingController::class, 'rateServer'])->middleware('auth:sanctum');
Route::post('/servers/{server}/favorite', [FavoriteController::class, 'addToFavorites'])->middleware('auth:sanctum');
Route::delete('/servers/{server}/favorite', [FavoriteController::class, 'removeFromFavorites'])->middleware('auth:sanctum');

