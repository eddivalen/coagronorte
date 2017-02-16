<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoSiembra extends Model
{
   	protected $table      = 'estado_siembras';
	protected $primaryKey = 'numero';
	public $timestamps    = false;
	protected $fillable   = ['numero','archivo','descripcion','fecha','duracion','tamano','tipo','codigo_visitas']; 

	public function visita(){
		return $this->belongsTo(App\Visita::class, 'codigo_visitas','codigo');
	}
}
