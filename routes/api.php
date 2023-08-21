<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NotController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register',[AuthController::class ,'register']);
Route::post('/login',[AuthController::class ,'login']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/note/create',[NotController::class ,'store'])->middleware('auth:sanctum');
Route::post('/note/{note}',[NotController::class ,'update'])->middleware('auth:sanctum');
Route::delete('/note/{note}',[NotController::class ,'destory'])->middleware('auth:sanctum');

