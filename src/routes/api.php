<?php

use App\Http\Controllers\GrantController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/item/search', [ItemController::class, 'search'])->middleware('api.auth');
Route::post('/users/search', [UserController::class, 'search'])->middleware('api.auth');

Route::get('/item/{id}', [ItemController::class, 'ApiGet'])->middleware('api.auth');
Route::post('/item/store', [ItemController::class, 'ApiStore'])->middleware('api.auth');
Route::post('/item/grant', [GrantController::class, 'GrantItem'])->middleware('api.auth');
