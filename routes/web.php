<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return 'Versión web del api';
});
Route::get('validar-correo',['as' => 'validarCorreo', 'uses'=>'UsuarioController@validarCorreo']);

// Envía la vista para reestablecer contraseña
Route::get('reestablecer-contrasena',function (){
	return 'vista con formulario de reestablecer contraseña';
});
// Recibe lo enviado por post para validar la contraseña
Route::post('reestablecer-contrasena',['as' => 'reestablecerContrasena', 'uses'=>'PasswordController@reestablecerContrasena']);