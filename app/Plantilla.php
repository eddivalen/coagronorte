<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Plantilla extends Model
{
    protected $table      = 'plantillas';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','codigo_actividad','ciclo_dias_conteo','dias_alerta'];

	public function actividad(){
		return $this->belongsTo(App\Actividad::class, 'codigo_actividad','codigo');
	}
	public function usuarios() {
    	return $this->belongsToMany('App\Usuario','detalle_plantilla','codigo','cedula')->using('App\DetallePlantilla')
            ->withPivot('cumplimiento','fecha_inicio');
    }
}
