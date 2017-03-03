<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table      = 'ciudades';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion','codigo_municipio'];

	public function zonas(){
		return $this->hasMany(Zona::class,'codigo_ciudad','codigo');
	}
	public function municipio(){
		return $this->belongsTo(Municipio::class, 'codigo_municipio','codigo');
	}

}
