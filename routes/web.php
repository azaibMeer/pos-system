<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\OutletController;
use Illuminate\Support\Facades\Auth;



Route::get('/', [AuthController::class, 'create']);
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/pos', [PosController::class, 'index']);
Route::get('/outletupdate/{id}', [OutletController::class, 'outletupdate']);

Route::get('/logout', function(Request $request) {
    Auth::logout();
    Session::flush();
    return Redirect::to('/');
});