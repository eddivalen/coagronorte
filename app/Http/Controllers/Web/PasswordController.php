<?php
namespace App\Http\Controllers\Web;
use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Jobs\EnviarCorreoForgotPassword;
use App\Usuario;
use App\Http\Requests\ResetPasswordRequest;

use Debugbar;
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
        
        return view('auth.passwords.sended');
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

    	return view('auth.passwords.reseted');
    }
    public function reestablecerView()
    {
    	return view('auth.passwords.email');
    }
    public function sendedView()
    {
    	return view('auth.passwords.sended');
    }
    public function resetView()
    {
        return view('auth.passwords.reset');
    }
}
