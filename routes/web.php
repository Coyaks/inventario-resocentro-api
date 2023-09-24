<?php

use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    //return view('test/test');
});
Route::get('/home', HomeController::class);
Route::get('/test', [\App\Http\Controllers\admin\TestController::class, 'index']);

#Laravel 10
/*Route::controller(UsersController::class)->group(function (){
    Route::get('/users', 'index');
    Route::get('/users/create', 'create');
    Route::get('/users/{id}', 'show');
});*/

//Route::resource('products', 'productsController');
