<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;



Route::get('/', [AuthController::class, 'create']);
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/pos', [PosController::class, 'index']);
Route::get('/outletupdate/{id}', [OutletController::class, 'outletupdate']);

// Customer route
Route::get('/customer/list', [CustomerController::class,'index']);
Route::get('/customer/create', [CustomerController::class,'create']);
Route::post('/customer/store', [CustomerController::class,'store']);
Route::get('/customer/edit/{id}', [CustomerController::class,'edit']);
Route::post('/customer/update/{id}', [CustomerController::class,'update']); 
Route::get('/customer/delete/{id}' , [CustomerController::class , 'destroy']);

Route::get('/logout', function(Request $request) {
    Auth::logout();
    Session::flush();
    return Redirect::to('/');
});