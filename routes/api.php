<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/** Usuarios */
Route::group(['prefix' => 'Users', 'controller' => UserController::class], function(){
    Route::get('/GetAll','getAllUsers');
    Route::get('/GetOne/{user}', 'getAnUser');
    Route::post('/Create', 'createUser');
    Route::put('/Update/{user}','updateUser' );
    Route::delete('/Delete/{user}','deleteUser');
});

/** Categorias */
Route::group(['prefix' => 'Categories', 'controller' => CategoryController::class], function(){
    Route::get('/GetAll', 'getAllCategories');
});

/** Productos */
Route::group(['prefix' => 'Products', 'controller' => ProductController::class], function(){
    Route::get('/GetAll', 'getallProduts');
    Route::post('/save', 'saveProduct');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
