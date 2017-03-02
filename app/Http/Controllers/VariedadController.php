<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CreateVariedadRequest;
use App\Http\Requests\UpdateVariedadRequest;
use App\Variedad;

class VariedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $variedades = Variedad::paginate(10);
        return response()->json(['variedades'=>$variedades]);
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
    public function store(CreateVariedadRequest $request)
    {
       $variedad = Variedad::create($request->input());
       return response()->json(['ok'=>'Variedad creada','variedad'=>$variedad],200);
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
    public function update(UpdateVariedadRequest $request, $id)
    {
        $variedad = Variedad::findOrFail($id);

        $variedad->update($request->input());

        return response()->json(['ok' => 'Actualizado','variedad'=>$variedad], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $variedad = Variedad::findOrFail($id);
        
        $variedad->delete();

        return response()->json(['ok'=>'Eliminado'],200);
    }
}
