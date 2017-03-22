<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateLoteRequest;
use App\Http\Requests\UpdateLoteRequest;
use App\Lote;
class LoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lotes = Lote::paginate(10);
        return response()->json(['lotes'=>$lotes]);
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
    public function store(CreateLoteRequest $request)
    {   
        $lote = Lote::create($request->input());

        return response()->json([
            'ok'        => 'Lote creada',
            'lote' => $lote
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
    public function update(UpdateLoteRequest $request, $id)
    {
        $lote = Lote::findOrFail($id);

        $lote->update($request->input());

        return response()->json([
            'ok'       => 'Actualizado',
            'lote' => $lote
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
        $lote = Lote::findOrFail($id);
        
        $lote->delete();

        return response()->json(['ok'=>'Eliminado'],200);
    }
}
