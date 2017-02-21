<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\EnviarCorreoForgotPassword;
use App\Http\Requests\ForgotPasswordRequest;
use App\Usuario;
use JWTAuth, Validator;
class UsuarioController extends Controller
{
    public function validarCorreo(Request $request){
        $validator = Validator::make($request->input(),[
            'email' => 'required|exists:usuarios,correo_electronico|usuario_no_validado',
            'token' => 'required'
            ]);
         if ($validator->fails()) {
            return 'validación incorrecta por lo enviado en el get';
        }
        $correo_electronico = $request->email;
        $token = $request->token;
        if (is_null($usuario = Usuario::where([
            ['correo_electronico', $correo_electronico],
            ['confirmation_token',$token]])
            ->first())
        ) {
            return 'validación incorrecta, no coindicen los datos';
        }
        $usuario->confirmation_token = null;
        $usuario->confirmacion = 1;

        $usuario->save();

        return 'usuario validado';
    }  
}
