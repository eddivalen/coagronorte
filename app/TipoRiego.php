<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRiego extends Model
{
    protected $table      = 'tipo_riegos';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion'];

	public function lotes()
    {
        return $this->hasMany(App\Lote::class,'codigo_riego','codigo');
    }
}
