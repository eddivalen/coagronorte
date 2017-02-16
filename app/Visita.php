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
        return $this->hasMany(App\EstadoSiembra::class,'codigo_visitas','codigo');
    }
    public function siembra(){
		return $this->belongsTo(App\Siembra::class, 'codigo_siembra','codigo');
	}
	 public function visitas() {
    	return $this->belongsToMany('App\Producto','producto_recomendaciones','codigo','codigo')->using('App\ProductoRecomendacion')
            ->withPivot('cantidad','dosis','aplicacion','observaciones','archivo');
    }
    public function recorridos()
    {
        return $this->hasMany(App\Recorrido::class,'codigo_visita','codigo');
    }
}
