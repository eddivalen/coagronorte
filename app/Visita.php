<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Visita extends Model
{
    protected $table      = 'visitas';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
    
	protected $fillable   = ['codigo','codigo_siembra','fecha','presencia_agrigultor','registro_ausencia','validado','valoracion','opinion','agronomo','archivo'];

	public function estados_siembras()
    {
        return $this->hasMany(EstadoSiembra::class,'codigo_visitas','codigo');
    }
    public function siembra(){
		return $this->belongsTo(Siembra::class, 'codigo_siembra','codigo');
	}
	 public function visitas() {
    	return $this->belongsToMany(Producto::class,'producto_recomendaciones','codigo','codigo')->using(ProductoRecomendacion::class)
            ->withPivot('cantidad','dosis','aplicacion','observaciones','archivo');
    }
    public function recorridos()
    {
        return $this->hasMany(Recorrido::class,'codigo_visita','codigo');
    }
    public function agronomoItem()
    {
        return $this->belongsTo(Usuario::class,'agronomo','cedula');
    }
}
