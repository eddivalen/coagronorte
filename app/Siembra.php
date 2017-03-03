<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siembra extends Model
{
    protected $table      = 'siembras';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','fecha_siembra','fecha_siembra_estimada','fecha_estimada_corta','fecha_real_corta','codigo_lote','dias_germinado','hectareas','punto_referencia','sistema_preparacion','codigo_tipo_semilla','codigo_variedad','codigo_tipo_siembra','arroz_rojo','semilla_objetable','rendimiento_ha','observaciones'];

	public function tipo_siembra(){
		return $this->belongsTo(TipoSiembra::class, 'codigo_tipo_siembra','codigo');
	}
	public function variedad(){
		return $this->belongsTo(Variedad::class, 'codigo_variedad','codigo');
	}
	public function visitas()
    {
        return $this->hasMany(Visita::class,'codigo_siembra','codigo');
    }
    public function tipo_semilla(){
		return $this->belongsTo(TipoSemilla::class, 'codigo_tipo_semilla','codigo');
	}
}
