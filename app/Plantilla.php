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

	public function actividad()
	{
		return $this->belongsTo(Actividad::class, 'codigo_actividad','codigo');
	}

	public function usuarios()
	{
    	return $this->belongsToMany(Usuario::class,'detalle_plantilla', 'codigo', 'cedula')
    		->using(DetallePlantilla::class)
       		->withPivot('cumplimiento', 'fecha_inicio');
    }
}
