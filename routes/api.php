<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', 'LoginController@login');

Route::group([ 'middleware' => 'auth:sanctum' ], function () {
    Route::post('/logout', 'LoginController@logout');
    Route::get('/lights', 'LightController@index');
    Route::get('/light/{id}', 'LightController@show');
    Route::put('/light/{id}', 'LightController@update');
});
