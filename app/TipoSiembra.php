<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoSiembra extends Model
{
    protected $table      = 'tipo_siembra';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion'];

	public function siembras()
    {
        return $this->hasMany(App\Siembra::class,'codigo_tipo_siembra','codigo');
    }
}
