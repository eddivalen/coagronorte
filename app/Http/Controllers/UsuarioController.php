<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\CreateUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Requests\ForgotPasswordRequest;
use App\Http\Requests\ConfirmacionRequest;
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
        $usuarios = Usuario::paginate(10);
        return response()->json(['usuarios'=>$usuarios]);
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
       $usuario = new Usuario($request->input());
        $usuario->save();
        // Enviar correo para confirmar cuenta
        $this->dispatch(new EnviarConfirmacionDeCuenta($usuario));
        return response()->json([
            'ok'=>'Usuario creado, validar correo'
            ],201);
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
    public function update(UpdateUsuarioRequest $request, $id)
    {
        $usuario = Lote::findOrFail($id);

        $usuario->update($request->input());

        return response()->json([
            'ok'       => 'Actualizado',
            'usuario' => $usuario
            ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        
        $usuario->delete();

        return response()->json(['ok'=>'Eliminado'],200);
    
    }
  
    
}
