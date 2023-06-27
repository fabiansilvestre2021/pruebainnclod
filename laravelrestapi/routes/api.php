<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/doc_documento', 'App\Http\Controllers\DocumentoController@index');
Route::post('/doc_documento', 'App\Http\Controllers\DocumentoController@store');
Route::post('/doc_documento/{id}', 'App\Http\Controllers\DocumentoController@update');
Route::delete('/doc_documento/{id}', 'App\Http\Controllers\DocumentoController@destroy');


Route::get('/tip_documento', 'App\Http\Controllers\TipDocController@index');
Route::post('/tip_documento', 'App\Http\Controllers\TipDocController@store');

Route::get('/pro_proceso', 'App\Http\Controllers\ProcesoController@index');
Route::post('/pro_proceso', 'App\Http\Controllers\ProcesoController@store');

Route::get('/tabla', 'UserController@index');