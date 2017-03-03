<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateTipoSiembraRequest;
use App\Http\Requests\UpdateTipoSiembraRequest;
use App\TipoSiembra;
class TipoSiembraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tiposiembras = TipoSiembra::paginate(10);
        return response()->json(['tiposiembras'=>$tiposiembras]);
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
    public function store(CreateTipoSiembraRequest $request)
    {
       $tiposiembra = TipoSiembra::create($request->input());
       return response()->json([
        'ok'          => 'TipoSiembra creada',
        'tiposiembra' => $tiposiembra
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
    public function update(UpdateTipoSiembraRequest $request, $id)
    {
        
        $tiposiembra = TipoSiembra::findOrFail($id);

        $tiposiembra->update($request->input());

        return response()->json([
            'ok'          => 'actualizado',
            'tiposiembra' => $tiposiembra
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
        $tiposiembra = TipoSiembra::findOrFail($id);
        
        $tiposiembra->delete();

        return response()->json(['ok'=>'deleted'],200);
    }
}
