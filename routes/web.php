<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;



Route::get('/', [AuthController::class, 'create']);
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/dashboard', [DashboardController::class, 'index']);
