<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateUsuarioRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ConfirmacionRequest;
//use Illuminate\Support\Facades\Validator;
use App\Usuario;

use App\Jobs\EnviarConfirmacionDeCuenta;
use App\Jobs\EnviarCorreoForgotPassword;

use JWTAuth, Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUsuarioRequest $request)
    {
        echo "prueba";
       $usuario = new Usuario($request->input());
        $usuario->save();
        // Enviar correo para confirmar cuenta
        $this->dispatch(new EnviarConfirmacionDeCuenta($usuario));
        return response()->json(['ok'=>'Usuario creado, validar correo'],200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
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
