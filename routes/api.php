<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authController;
use App\Http\Controllers\pharmacie_authController;
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

Route::post('/warehouse/register',[authController::class,'register']);

Route::post('/warehouse/login',[authController::class,'login']);

//Route::middleware('auth:passport')->group(function()

Route::get('/warehouse/logout',[authController::class,'logout']);








Route::post('/pharmacie/register',[pharmacie_authController::class,'register']);

Route::post('/pharmacie/login',[pharmacie_authController::class,'login']);

Route::get('/pharmacie/logout',[pharmacie_authController::class,'logout']);
