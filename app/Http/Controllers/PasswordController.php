<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests;
use App\Jobs\EnviarCorreoForgotPassword;
use App\Usuario;
class PasswordController extends Controller
{
    public function forgotPassword(ForgotPasswordRequest $request) {
        // TODO 
        // Despacha el trabajo que enviará el correo electrónico a quien olvido la contraseña
        // $this->dispatch(new EnviarCorreoForgotPassword($request->correo_electronico));
        
        return response()->json(['ok' => 'correo electronico enviado'], 200);
    }
}