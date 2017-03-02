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
Route::get('/', function(){
	return response()->json(['api' => ['version' => '1.0']]);
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('crear-usuario','UsuarioController@store');
Route::post('login', 'LoginController@login');
//Route::post('forgot_password', 'PasswordController@forgotPassword');
	
	Route::group(['middleware' => 'jwt.auth'], function() {
		Route::resource('variedad','VariedadController', ['only' => [
		'index', 'show', 'store', 'update', 'destroy'
		]]);
		Route::resource('tiposiembra','TipoSiembraController', ['only' => [
		'index', 'show', 'store', 'update', 'destroy'
		]]);
		Route::resource('tiposemilla','TipoSemillaController', ['only' => [
		'index', 'show', 'store', 'update', 'destroy'
		]]);
		Route::resource('tipousuario','TipoUsuarioController', ['only' => [
		'index', 'show', 'store', 'update', 'destroy'
		]]);
		Route::resource('implemento','ImplementoController', ['only' => [
		'index', 'show', 'store', 'update', 'destroy'
		]]);
		Route::resource('unidad','UnidadController', ['only' => [
		'index', 'show', 'store', 'update', 'destroy'
		]]);
		Route::get('logout', 'LoginController@logout');
		Route::resource('usuarios', 'UsuarioController');
	});

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
	//...
});

