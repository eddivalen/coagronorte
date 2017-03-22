<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateSiembraRequest;
use App\Http\Requests\UpdateSiembraRequest;
use App\Siembra;
class SiembraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $siembras = Siembra::paginate(10);
        return response()->json(['siembras'=>$siembras]);
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
    public function store(CreateSiembraRequest $request)
    {   
        $siembra = Siembra::create($request->input());

        return response()->json([
            'ok'        => 'Siembra creada',
            'siembra' => $siembra
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
    public function update(UpdateSiembraRequest $request, $id)
    {
        $siembra = Siembra::findOrFail($id);

        $siembra->update($request->input());

        return response()->json([
            'ok'       => 'Actualizado',
            'siembra' => $siembra
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
        $siembra = Siembra::findOrFail($id);
        
        $siembra->delete();

        return response()->json(['ok'=>'Eliminado'],200);
    }
}
