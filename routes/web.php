<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;


use App\Http\Controllers\Auth\ConfirmPasswordController;



Route::get('/', function () {
    return view('index');
});

/**Usuarios */
Route::group(['prefix' => 'Users', 'controller' => UserController::class], function(){
    Route::post('/Create', 'createUser') -> name('user.create.post');
});

Route::group(['prefix' => 'Users', 'middleware' => ['auth', 'role:admin'], 'controller' => UserController::class],function(){
    Route::get('/', 'ShowAllUsers') -> name('users');

    Route::get('/Create', 'showCreateUser') -> name('user.create');

    Route::get('/Edit/{user}', 'showEditUser') -> name('user.edit');

    Route::put('/Edit/{user}','updateUser') ->name('user.edit.put');

    Route::delete('Delte/{user}','deleteUser') -> name('user.delete');
});

/**Categorias */
Route::group(['prefix' => 'Categories', 'middleware' => ['auth', 'role:admin'], 'controller' => CategoryController::class],function(){
    Route::get('/', 'showCategories') -> name('categories');

    Route::get('/GetAll','getAllCategories');

    Route::get('/GetOne/{category}','getACategory');

    Route::post('/Save','saveCategory');

    Route::post('/Update/{category}','updateCategory');

    Route::delete('/Delete/{category}','deleteCategory');

    Route::get('/GetAllForDataTable','getAllCategoriesForDataTable');
});

Route::get('/',[CategoryController::class, 'showHomeWithCategories']);

Route::group(['prefix' => 'CategoriesView', 'controller' => CategoryController::class], function(){
    Route::get('/','categoriesView') -> name('categoriesview.index');

    Route::get('/GetAllWithProducts','getAllCategoriesWithProducts');

    Route::get('/GetOneWhithProduct','getACategoryWithProduct') -> name('catregoriesview.index');
});

Route::group(['prefix' => 'categories', 'controller' => CategoryController::class],function(){
    Route::get('/GetAll', 'getAllCategories');
});

/**Productos */
Route::group(['prefix' => 'Products', 'middleware' => ['auth', 'role:admin'], 'controller' => ProductController::class],function(){
    Route::get('/', 'showProducts') -> name('products');

    Route::get('/GetAll', 'getAllProducts');

    Route::get('/GetAllDataTable', 'getAllProductsForDataTable');

    Route::get('/GetOne/{product}','getAProduct');

    Route::post('/Save','saveProduct');

    Route::post('/Update/{product}','updateProduct');

    Route::delete('/Delete/{product}','deleteProduct');
});

Route::get('/getDetail/{product}', [ProductController::class, 'getProductDetail'])->name('getproductdetail');

/* Auth::routes(); */

Route::group(['controller' => LoginController::class], function(){
    /**Iniciar secion Rutas */
    Route::get('/login','showLoginForm') -> name('login');

    Route::post('/login','login');
    /**Cerrar secion Rutas */
    Route::post('/logout','logout') -> name('logout');
});

Route::group(['controller' => RegisterController::class ],function(){
    /**Registro Rutas */
    Route::get('/register','showRegistrationForm') -> name('register');

    Route::post('/register','register');
});

Route::group(['controller' => ResetPasswordController::class], function(){
    /**Ruta de Reseteo De Contraseña */
    Route::get('/password/reset/{token}', 'showResetFrom') -> name('password.reset');

    Route::post('/password/reset','reset') -> name('password.update');
});

Route::group(['controller' => ConfirmPasswordController::class],function(){
    /**Ruta De Confirmacion de Contraseña */
    Route::get('/password/confirm', 'showConfirmForm') -> name('password.confirm');

    Route::post('/password/confirm', 'confirm');
});

Route::group(['controller' => VerificationController::class], function(){
    /**Rutas de verificacion de email */
    Route::get('/email/verify','show') -> name('verification.notice');

    Route::get('/email/verify/{id}/{hash}','verify') -> name('verification.verify');

    Route::post('/email/resend', 'resend') -> name('verification.resend');
});

/**Carrito */
Route::post('/additem', [CartController::class, 'addItem'])->name("additem");
Route::get('/showcart', [CartController::class, 'showCart'])->name("showcart");
Route::get('/incrementar/{id}', [CartController::class, 'incrementarCantidad'])->name("incrementarcantidad");
Route::get('/decrementar/{id}', [CartController::class, 'decrementarCantidad'])->name("decrementarcantidad");
Route::get('/eliminaritem/{id}', [CartController::class, 'eliminarItem'])->name("eliminaritem");
Route::get('/eliminarcarrito', [CartController::class, 'eliminarCarrito'])->name("eliminarcarrito");



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
