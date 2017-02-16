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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('prueba','PruebaController');

Route::group(['middleware' => 'api'], function() {
	Route::post('login', 'LoginController@login');
	Route::post('forgot_password', 'PasswordController@forgotPassword');
	Route::get('confirmacion', 'UsuarioController@confirmacion');
	Route::group(['middleware' => 'jwt.auth'], function() {
		Route::get('logout', 'LoginController@logout');
		Route::resource('usuarios', 'UsuarioController');
	});
});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
	//...
});

