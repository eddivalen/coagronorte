<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests;

use App\Jobs\EnviarCorreoForgotPassword;
use App\Usuario;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
class PasswordController extends Controller
{
	/**
	 * Solicitud para enviar correo reestableciendo contraseña
	 * API METHOD
	 * @param  ForgotPasswordRequest $request request del cliente
	 * @return Response                         Ok
	 */
    public function forgotPassword(ForgotPasswordRequest $request) {
        // Despacha el trabajo que enviará el correo electrónico a quien olvido la contraseña
        $this->dispatch(new EnviarCorreoForgotPassword($request->correo_electronico));
        
        return response()->json(['ok' => 'correo electronico enviado'], 200);
    }
    /**
     * Recibe los campos del formulario de cambio de contraseña
     * WEB METHOD
     * @param  ReestablecerContrasenaRequest $request 
     * @return View                                 vista de confirmación
     */
    public function reestablecerContrasena(ResetPasswordRequest $request) {

		$usuario = Usuario::where('reset_password_token',$request->reset_password_token)->first();
		$usuario->password             = $request->password;
		$usuario->reset_password_token = null;
		$usuario->save();

    	return 'contraseña cambiada';
    }
}