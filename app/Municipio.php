<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $table      = 'municipios';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion','codigo_departamento'];

	public function ciudades()
    {
        return $this->hasMany(App\Ciudad::class,'codigo_municipio','codigo');
    }
    public function departamento()
    {
        return $this->belongsTo(App\Departamento::class,'codigo_deparmento','codigo');
    }

}
