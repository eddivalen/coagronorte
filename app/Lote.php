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
		return $this->belongsTo(TipoRiego::class, 'codigo_riego','codigo');
	}
	public function zona(){
		return $this->belongsTo(Zona::class, 'codigo_zona','codigo');
	}
	public function siembrasItem() {
		return $this->hasMany(Siembra::class, 'codigo_lote', 'codigo');
	}
	public function propietarioItem() {
		return $this->belongsTo(Usuario::class, 'propietario', 'cedula');
	}
}
