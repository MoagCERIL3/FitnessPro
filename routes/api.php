<?php

use Illuminate\Http\Request;

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

Route::post('register', 'API\RegisterController@register');

Route::post('login', 'API\LoginController@login');

Route::post('refresh', 'API\LoginController@refresh');



Route::middleware('auth:Utilisateurs-api')->get('/user', function (Request $request) {
     // dd("Hello world");
    Route::post('logout', 'API\LoginController@logout');

    //return $request->user();
});
