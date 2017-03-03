<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSemilla extends Model
{
    protected $table      = 'tipo_semilla';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion'];

	public function siembras()
    {
        return $this->hasMany(Siembra::class,'codigo_tipo_semilla','codigo');
    }
}
