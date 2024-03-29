<?php

use App\Http\Controllers\AppController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SessionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [IndexController::class, 'index']);


Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/items', [AdminController::class, 'items']);
Route::get('/terminal', [AppController::class, 'index']);

Route::post('/auth', [SessionController::class, 'auth'])->name('auth');
