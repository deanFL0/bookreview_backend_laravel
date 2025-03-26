<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'prefix'=>'auth'
    ], function(){
        Route::post('register', [AuthController::class, 'register']);
        Route::post('token', [AuthController::class, 'token']);
        Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
    }
);


Route::group([
    'middleware'=>'auth:sanctum'
    ], function(){
        Route::apiResource('users', UserController::class);
    } 
);
