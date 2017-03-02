<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTipoUsuarioRequest;
use App\Http\Requests\UpdateTipoUsuarioRequest;
use App\TipoUsuario;
class TipoUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipousuarios = TipoUsuario::paginate(10);
        return response()->json(['tipousuarios'=>$tipousuarios]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTipoUsuarioRequest $request)
    {
       $tipousuario = TipoUsuario::create($request->input());
       return response()->json(['ok'=>'TipoUsuario creado','tipousuario'=>$tipousuario],200);
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
    public function update(UpdateTipoUsuarioRequest $request, $id)
    {
        $tipousuario = TipoUsuario::findOrFail($id);

        $tipousuario->update($request->input());

        return response()->json(['ok' => 'Actualizado','tipousuario'=>$tipousuario], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipousuario = TipoUsuario::findOrFail($id);
        
        $tipousuario->delete();

        return response()->json(['ok'=>'Eliminado'],200);
    }
}
