<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreatePlantillaRequest;
use App\Http\Requests\UpdatePlantillaRequest;
use App\Plantilla;
use App\Actividad;
class PlantillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plantillas = Plantilla::paginate(10);
        return response()->json(['plantillas'=>$plantillas]);
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
    public function store(CreatePlantillaRequest $request)
    {   
        $plantilla = Plantilla::create($request->input());

        return response()->json([
            'ok'        => 'Plantilla creada',
            'plantilla' => $plantilla
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
    public function update(UpdatePlantillaRequest $request, $id)
    {
        $plantilla = Plantilla::findOrFail($id);

        $plantilla->update($request->input());

        return response()->json([
            'ok'       => 'Actualizado',
            'plantilla' => $plantilla
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
        $plantilla = Plantilla::findOrFail($id);
        
        $plantilla->delete();

        return response()->json(['ok'=>'Eliminado'],200);
    }
}
