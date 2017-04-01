<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
class ProductoRecomendacion extends Pivot
{
    protected $table      = 'producto_recomendaciones';
	public $timestamps    = false;
	protected $fillable   = ['codigo_producto','codigo_visita','cantidad','dosis','aplicacion','observaciones','archivo'];

	public function visita(){
		return $this->belongsTo(Visita::class, 'codigo_visita','codigo');
	}

}
