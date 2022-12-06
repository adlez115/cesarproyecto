<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


//crud usuarios
Route::get('/users',[UsersController::class,'obtenerAllUsuarios']);
Route::post('/users',[UsersController::class,'crearUsuarios']);
Route::put('/users/{id}',[UsersController::class,'modificarUsuarios']);
Route::delete('/users/{id}',[UsersController::class,'eliminarUsuarios']);



