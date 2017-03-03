<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recorrido extends Model
{
    protected $table      = 'recorridos';
	protected $primaryKey = 'punto';
	public $timestamps    = false;
	protected $fillable   = ['punto','latitud','longitud','codigo_visita'];

	public function visita(){
		return $this->belongsTo(Visita::class, 'codigo_visita','codigo');
	}
}
