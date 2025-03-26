<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('auth/token', [AuthController::class, 'token']);
Route::middleware('auth:sanctum')->post('auth/logout', [AuthController::class, 'logout']);

Route::group([
    'middleware'=>'auth:sanctum'
    ], function(){
        Route::apiResource('users', UserController::class);
    } 
);
