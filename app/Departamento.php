<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table      = 'departamentos';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion'];

	public function municipios()
    {
        return $this->hasMany(App\Municipio::class,'codigo_departamento','codigo');
    }
}
