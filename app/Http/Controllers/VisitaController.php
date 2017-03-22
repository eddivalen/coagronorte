<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateVisitaRequest;
use App\Http\Requests\UpdateVisitaRequest;
use App\Http\Requests\ListadoVisitaRequest;
use App\Http\Requests\ProgramarVisitaListaRequest;
use App\Http\Requests\ProgramarVisitaRequest;
use App\Http\Transformers\VisitaTransformer;
use App\Http\Transformers\VisitasCollectionTransformer;
use App\Http\Transformers\ProgramarVisitaCollectionTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use League\Fractal;
use App\Visita;
use App\Siembra;
use App\Usuario;
use App\Municipio;
use App\Zona;
use App\Lote;
use JWTAuth;
class VisitaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ListadoVisitaRequest $request)//
    { 
        $usuario = JWTAuth::parseToken()->authenticate();
        switch ($request->tipo) {
            case 'dia':
                $visitas = Visita::where('fecha', $request->dia)
                    ->where('agronomo', $usuario->cedula)
                    ->with('siembra','siembra.lote','agronomoItem','siembra.lote.zona','siembra.lote.propietarioItem')
                    ->paginate(10);
                return response()->collection($visitas, new VisitasCollectionTransformer);
            break;
            case 'rango':
                 $visitas = Visita::whereBetween('fecha',[$request->fecha_inicio,$request->fecha_final])
                     ->where('agronomo',$usuario->cedula)
                     ->with('siembra','siembra.lote','agronomoItem','siembra.lote.zona')
                     ->paginate(10);
                 return response()->collection($visitas, new VisitasCollectionTransformer);
            break;
        }      
    }
    /**
     * Muestra las visitas disponibles para programarlas
     * con filtros de busqueda
     *
     * @return \Illuminate\Http\Response
     */
    public function programarVisitaLista(ProgramarVisitaListaRequest $request){
        $lotes_q = (new Lote)->newQuery();
        $usuario = JWTAuth::parseToken()->authenticate();
        if($request->has('zona')){
            $lotes_q = DB::table('lotes')
                ->join('zonas','lotes.codigo_zona','=','zonas.codigo')
                ->join('ciudades','zonas.codigo_ciudad','=','ciudades.codigo')
                ->join('municipios','ciudades.codigo_municipio','=','municipios.codigo')
                ->join('siembras','siembras.codigo_lote','=','lotes.codigo')
                ->join('usuarios','lotes.propietario','=','usuarios.cedula')
                ->where('zonas.descripcion',$request->zona)
                ->select(DB::raw('lotes.codigo as id_lote,siembras.codigo as id_siembra,lotes.vereda,siembras.punto_referencia,zonas.descripcion as zona,municipios.descripcion as municipio,usuarios.cedula as id_propietario,usuarios.nombre as propietario_nombre,usuarios.apellido as propietario_apellido'))
                ->get();
        }
        if($request->has('vereda')){
            $lotes_q = DB::table('lotes')
                ->join('zonas','lotes.codigo_zona','=','zonas.codigo')
                ->join('ciudades','zonas.codigo_ciudad','=','ciudades.codigo')
                ->join('municipios','ciudades.codigo_municipio','=','municipios.codigo')
                ->join('siembras','siembras.codigo_lote','=','lotes.codigo')
                ->join('usuarios','lotes.propietario','=','usuarios.cedula')
                ->where('vereda', $request->vereda)
                ->select(DB::raw('lotes.codigo as id_lote,siembras.codigo as id_siembra,lotes.vereda,siembras.punto_referencia,zonas.descripcion as zona,municipios.descripcion as municipio,usuarios.cedula as id_propietario,usuarios.nombre as propietario_nombre,usuarios.apellido as propietario_apellido'))
                ->get();                
        }
         if($request->has('municipio')){
            $lotes_q = DB::table('lotes')
                ->join('zonas','lotes.codigo_zona','=','zonas.codigo')
                ->join('ciudades','zonas.codigo_ciudad','=','ciudades.codigo')
                ->join('municipios','ciudades.codigo_municipio','=','municipios.codigo')
                ->join('siembras','siembras.codigo_lote','=','lotes.codigo')    
                ->join('usuarios','lotes.propietario','=','usuarios.cedula')
                ->where('municipios.descripcion',$request->municipio)
                ->select(DB::raw('lotes.codigo as id_lote,siembras.codigo as id_siembra,lotes.vereda,siembras.punto_referencia,zonas.descripcion as zona,municipios.descripcion as municipio,usuarios.cedula as id_propietario,usuarios.nombre as propietario_nombre,usuarios.apellido as propietario_apellido'))
                ->get();                
        }
        if($request->has('propietario')){
            $lotes_q = DB::table('lotes')
                ->join('zonas','lotes.codigo_zona','=','zonas.codigo')
                ->join('ciudades','zonas.codigo_ciudad','=','ciudades.codigo')
                ->join('municipios','ciudades.codigo_municipio','=','municipios.codigo')
                ->join('siembras','siembras.codigo_lote','=','lotes.codigo')    
                ->join('usuarios','lotes.propietario','=','usuarios.cedula')
                ->where('propietario', $request->propietario)
                ->select(DB::raw('lotes.codigo as id_lote,siembras.codigo as id_siembra,lotes.vereda,siembras.punto_referencia,zonas.descripcion as zona,municipios.descripcion as municipio,usuarios.cedula as id_propietario,usuarios.nombre as propietario_nombre,usuarios.apellido as propietario_apellido'))
                ->get();
        }
        return response()->json($lotes_q);
    }
    /**
     * Registra la visita a partir de la lista mostrada
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function programarVisita(ProgramarVisitaRequest $request){
        $visita = Visita::create($request->input());

        return response()->json([
            'ok'        => 'Visita programada',
            'visita' => $visita
        ],201); 
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
    public function store(CreateVisitaRequest $request)
    {   
        $visita = Visita::create($request->input());

        return response()->json([
            'ok'        => 'Visita creada',
            'visita' => $visita
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
    public function update(UpdateVisitaRequest $request, $id)
    {
        $visita = Visita::findOrFail($id);

        $visita->update($request->input());

        return response()->json([
            'ok'       => 'Actualizado',
            'visita' => $visita
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
        $visita = Siembra::findOrFail($id);
        
        $visita->delete();

        return response()->json(['ok'=>'Eliminado'],200);
    }
}
