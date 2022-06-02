<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminProductsController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminTablesController;
use App\Http\Controllers\Admin\AdminBillController;
use App\Http\Controllers\Admin\AdminOrderItemsController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\TestController;
use App\Http\Controllers\Admin\MapController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*API Tables */
Route::post('table_id/',[AdminTablesController::class, 'edit']);
Route::post('table_list',[AdminTablesController::class, 'index']);
Route::post('table',[AdminTablesController::class,'store']);
Route::post('table_edit/',[AdminTablesController::class,'update']);
Route::post('table_delete/',[AdminTablesController::class,'destroy']);

/*API Products */
Route::post('products_id/',[AdminProductsController::class, 'edit']);
Route::post('products_list', [AdminProductsController::class, 'index']);
Route::post('products', [AdminProductsController::class, 'store']);
Route::post('products_edit/', [AdminProductsController::class, 'update']);
Route::post('products_delete/', [AdminProductsController::class, 'destroy']);

/*API Bill */
Route::post('bill_id/',[AdminBillController::class, 'edit']);
Route::post('bill_list', [AdminBillController::class, 'index']);
Route::post('bill', [AdminBillController::class, 'store']);
Route::post('bill_edit/', [AdminBillController::class, 'update']);
Route::post('bill_delete/', [AdminBillController::class, 'destroy']);
/*API show OrderItems of Bill */
Route::post('bill_detail/',[AdminBillController::class, 'show']);

/*API Users */
Route::post('users_id/',[AdminUserController::class, 'edit']);
Route::post('users_list',[AdminUserController::class, 'index']);
Route::post('users',[AdminUserController::class, 'store']);
Route::post('users_edit/', [AdminUserController::class, 'update']);
Route::post('users_delete/', [AdminUserController::class, 'destroy']);

/**API Login, Logout Register */
//Route::post('login',[AdminUserController::class, 'login']);
Route::post('login',[LoginController::class, 'login']);
Route::post('logout',[LoginController::class, 'logout']);

/*API Order_Item */
Route::post('orderitem/{id}',[AdminOrderItemsController::class, 'edit']);
Route::post('orderitem_list',[AdminOrderItemsController::class, 'index']);
Route::post('orderitem',[AdminOrderItemsController::class, 'store']);
Route::post('orderitem_edit/{id}', [AdminOrderItemsController::class, 'update']);
Route::post('orderitem_delete/{id}', [AdminOrderItemsController::class, 'destroy']);


/*API test JWT */
Route::post('test',[TestController::class, 'test']);

/*API AN BoxyzVN */
Route::post('add_map',[MapController::class, 'store']);
Route::get('map_list',[MapController::class, 'index']);

