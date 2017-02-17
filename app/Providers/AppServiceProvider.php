<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Validator;
use App\Usuario;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('usuario_validado', function($attribute, $value, $parameters, $validator) {
            $usuario = Usuario::where('correo_electronico',$value)->first();
            return ( !is_null($usuario) && $usuario->confirmacion == 1 );
       });
        Validator::extend('usuario_no_validado', function($attribute, $value, $parameters, $validator) {
            $usuario = Usuario::where('correo_electronico',$value)->first();
            return ( !is_null($usuario) && $usuario->confirmacion == 0 );
       });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
