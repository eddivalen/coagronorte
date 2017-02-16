<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
class DetallePlantilla extends Pivot
{
	protected $table     = 'detalle_plantilla';
	public $timestamps   = false;
	protected $fillable  = ['codigo_plantilla','cedula_usuario','cumplimiento','fecha_inicio'];
}
