<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;



Route::get('/', [AuthController::class, 'create']);
Route::post('/authenticate', [AuthController::class, 'authenticate']);
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::get('/pos', [PosController::class, 'index']);
Route::get('/outletupdate/{id}', [OutletController::class, 'outletupdate']);

// Category routes
Route::get('/category/list', [CategoryController::class, 'show']);
Route::get('/category/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'update']);
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy']);
Route::get('/category/add/', [CategoryController::class, 'create']);
Route::post('/category/store/', [CategoryController::class, 'store']);
Route::get('/category/active/{id}', [CategoryController::class, 'active']);
Route::get('/category/inactive/{id}', [CategoryController::class, 'inactive']);

// end category routes 

// product routes 
Route::get('/product/list', [ProductController::class, 'show']);
Route::get('/product/add', [ProductController::class, 'create']);
Route::post('/product/store', [ProductController::class, 'store']);


// Customer route
Route::get('/customer/list', [CustomerController::class,'index']);
Route::get('/customer/create', [CustomerController::class,'create']);
Route::post('/customer/store', [CustomerController::class,'store']);
Route::get('/customer/edit/{id}', [CustomerController::class,'edit']);
Route::post('/customer/update/{id}', [CustomerController::class,'update']); 
Route::get('/customer/delete/{id}' , [CustomerController::class , 'destroy']);

// Outlet route
Route::get('/outlet/list', [OutletController::class,'index']);
Route::get('/outlet/create', [OutletController::class,'create']);
Route::post('/outlet/store', [OutletController::class,'store']);
Route::get('/outlet/edit/{id}', [OutletController::class,'edit']);
Route::post('/outlet/update/{id}', [OutletController::class,'update']); 
Route::get('/outlet/delete/{id}' , [OutletController::class , 'destroy']);
Route::get('/outlet/active/{id}', [OutletController::class, 'active']);
Route::get('/outlet/inactive/{id}', [OutletController::class, 'inactive']);

// Logout route
Route::get('/logout', function(Request $request) {
    Auth::logout();
    Session::flush();
    return Redirect::to('/');
});