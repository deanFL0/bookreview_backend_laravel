<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'namespace'=>'App\Http\Controllers',
    ], function(){
        Route::apiResource('users', UserController::class);
    } 
);
