<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::group(['middleware' => 'auth:sanctum'], function() {
    Route::get('/api/users/profile', [UserController::class, 'profile']);
});
