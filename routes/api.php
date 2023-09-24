<?php

use App\Http\Controllers\admin\AuthController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\VerifyController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\PersonsController;
use App\Http\Controllers\test\TestController;
use Illuminate\Support\Facades\Route;
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
Route::get('/test', [App\Http\Controllers\admin\TestController::class, 'index']);
Route::post('/test/form', [App\Http\Controllers\admin\TestController::class, 'formulario']);

Route::prefix('admin')->group(function () {
    Route::post('/auth/register', [AuthController::class, 'register']);
    Route::post('/auth/login', [AuthController::class, 'login']);
    Route::get('/verify', [VerifyController::class, 'index']);
});

Route::prefix('test')->group(function () {
    Route::get('/test', [TestController::class, 'index']);
});

Route::resource('/persons', PersonsController::class)->only('index', 'store', 'update', 'destroy');
Route::resource('/devices', DeviceController::class)->only('index', 'store', 'update', 'destroy');
Route::middleware(['auth:sanctum'])->group(function(){

    //Route::resource('/persons', PersonsController::class)->only('index', 'store', 'update', 'destroy');
    Route::prefix('admin')->group(function () {
        Route::get('/auth/logout', [AuthController::class, 'logout']);
        Route::get('/auth/profile', [AuthController::class, 'profile']);
        Route::get('/users', [UsersController::class, 'index']);
        Route::post('/users', [UsersController::class, 'create']);
        Route::get('/users/{id}', [UsersController::class, 'show']);

        Route::get('/products', [\App\Http\Controllers\admin\ProductsController::class, 'index']);
        Route::get('/products/{product}', '\App\Http\Controllers\ProductsController@show');

    });
});



