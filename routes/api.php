<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::group(['prefix'=> 'Users', 'controller' => UserController::class], function(){
    Route::get('GetAll','getAllUsers');
    Route::get('GetOne/{user}', 'getAnUser');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
