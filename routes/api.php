<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\EntriesController;
use App\Http\Controllers\CategoriesController;


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

//crud entries
Route::get('/entries',[EntriesController::class,'obtenerAllEntries']);
Route::post('/entries',[EntriesController::class,'crearEntries']);
Route::put('/entries/{id}',[EntriesController::class,'modificarEntries']);
Route::delete('/entries/{id}',[EntriesController::class,'eliminarEntries']);

//crud categories
Route::get('/categories',[CategoriesController::class,'obtenerAllCategories']);
Route::post('/categories',[CategoriesController::class,'crearCategories']);
Route::put('/categories/{id}',[CategoriesController::class,'modificarCategories']);
Route::delete('/categories/{id}',[CategoriesController::class,'eliminarCategories']);
