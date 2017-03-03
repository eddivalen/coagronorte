<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Producto extends Model
{
    protected $table      = 'productos';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','nombre','codigo_unidad',];

	public function unidad(){
		return $this->belongsTo(Unidad::class, 'codigo_unidad','codigo');
	}
	public function productos_recomendaciones()
    {
        return $this->hasMany(ProductoRecomendacion::class,'codigo_producto','codigo');
    }
    public function visitas() {
    	return $this->belongsToMany(Visita::class,'producto_recomendaciones','codigo','codigo')
             ->using(ProductoRecomendacion::class)
             ->withPivot('cantidad','dosis','aplicacion','observaciones','archivo');
    }
}
