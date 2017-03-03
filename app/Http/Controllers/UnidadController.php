<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateUnidadRequest;
use App\Http\Requests\UpdateUnidadRequest;
use App\Unidad;
class UnidadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unidades = Unidad::paginate(10);
        return response()->json(['unidades'=>$unidades]);
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
    public function store(CreateUnidadRequest $request)
    {
       $unidad = Unidad::create($request->input());
       return response()->json([
        'ok'     => 'Unidad creada',
        'unidad' => $unidad
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
    public function update(UpdateUnidadRequest $request, $id)
    {
        $unidad = Unidad::findOrFail($id);

        $unidad->update($request->input());

        return response()->json([
            'ok'     => 'Actualizado',
            'unidad' => $unidad
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
        $unidad = Unidad::findOrFail($id);
        
        $unidad->delete();

        return response()->json(['ok'=>'Eliminado'],200);
    }
}
