<?php

use App\Http\Controllers\TaskController;
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
    Route::post('create', [UserController::class, 'create']);
    Route::get('search', [UserController::class, 'search']);
});


Route::group([
    'middleware' => 'auth:api',
    'prefix' => 'task'
], function ($router){
    Route::post('create', [TaskController::class, 'create']);
    Route::patch('edit', [TaskController::class, 'edit']);
    Route::get('get', [TaskController::class, 'get']);
    Route::delete('delete', [TaskController::class, 'delete']);
    Route::get('getList', [TaskController::class, 'getList']);
});