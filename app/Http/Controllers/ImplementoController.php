<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateImplementoRequest;
use App\Http\Requests\UpdateImplementoRequest;
use App\Implemento;
class ImplementoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $implementos = Implemento::paginate(10);
        return response()->json(['implementos'=>$implementos]);
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
    public function store(CreateImplementoRequest $request)
    {
       $implemento = Implemento::create($request->input());
       return response()->json(['ok'=>'Implemento creado','implemento'=>$implemento],200);
    
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
    public function update(UpdateImplementoRequest $request, $id)
    {
        $implemento = Implemento::findOrFail($id);

        $implemento->update($request->input());

        return response()->json(['ok' => 'Actualizado','implemento'=>$implemento], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $implemento = Implemento::findOrFail($id);
        
        $implemento->delete();

        return response()->json(['ok'=>'Eliminado'],200);
    
    }
}
