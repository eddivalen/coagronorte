<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    protected $table      = 'lotes';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','vereda','codigo_zona','area','propietario','tenencia','analisis_suelo','fecha_analisis_suelo','pinsat','planos','archivo_planos','venta','asistencia_tecnica','codigo_riego','longitud','latitud'];

	public function tipo_riego(){
		return $this->belongsTo(App\TipoRiego::class, 'codigo_riego','codigo');
	}
	public function zona(){
		return $this->belongsTo(App\Zona::class, 'codigo_zona','codigo');
	}
}
