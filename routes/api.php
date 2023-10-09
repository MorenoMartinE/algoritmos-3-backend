<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;



Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
});


Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'user'
], function ($router){
    Route::get('test', [UserController::class, 'test']);
    Route::post('create', [UserController::class, 'create']);
    Route::get('search', [UserController::class, 'search']);
});