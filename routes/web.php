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

Route::get('/passwords/reset','PasswordController@resetView');
//Route::post('/passwords/reset', 'PasswordController@reestablecerContrasena');

Route::post('/passwords/reseted','PasswordController@reestablecerContrasena');




Route::get('forgot_password', 'PasswordController@forgotPassword');
Route::post('forgot_password', 'PasswordController@forgotPassword');

Route::get('/passwords/sended', 'PasswordController@sendedView');
Route::post('/passwords/sended', 'PasswordController@forgotPassword');

// Envía la vista para reestablecer contraseña
Route::get('reestablecer-contrasena', 'PasswordController@reestablecerView');
// Recibe lo enviado por post para validar la contraseña
Route::post('reestablecer-contrasena',['as' => 'reestablecerContrasena', 'uses'=>'PasswordController@forgotPassword']);
Auth::routes();

Route::get('/home', 'HomeController@index');
