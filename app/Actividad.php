<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
	protected $table      = 'actividades';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion'];


	public function plantillas()
    {
        return $this->hasMany(Plantilla::class, 'codigo_actividad','codigo');
    }
}
