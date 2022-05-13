<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminProductsController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', [AdminProductsController::class, 'index']);
Route::post('products', [AdminProductsController::class, 'store']);
Route::put('products/{id}', [AdminProductsController::class, 'update']);
Route::delete('products/{id}', [AdminProductsController::class, 'destroy']);
