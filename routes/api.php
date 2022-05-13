<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminProductsController;
use  App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminTablesController;
use App\Http\Controllers\Admin\AdminBillController;



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*API Tables */
Route::get('table',[AdminTablesController::class, 'index']);
Route::post('table',[AdminTablesController::class,'store']);
Route::put('table/{id}',[AdminTablesController::class,'update']);
Route::delete('table/{id}',[AdminTablesController::class,'destroy']);

/*API Products */
Route::get('products', [AdminProductsController::class, 'index']);
Route::post('products', [AdminProductsController::class, 'store']);
Route::put('products/{id}', [AdminProductsController::class, 'update']);
Route::delete('products/{id}', [AdminProductsController::class, 'destroy']);

/*API Bill */
Route::get('bill', [AdminBillController::class, 'index']);
Route::post('bill', [AdminBillController::class, 'store']);
Route::put('bill/{id}', [AdminBillController::class, 'update']);
Route::delete('bill/{id}', [AdminBillController::class, 'destroy']);

/*API Users */
Route::get('users',[AdminUserController::class, 'index']);
Route::post('users',[AdminUserController::class, 'store']);