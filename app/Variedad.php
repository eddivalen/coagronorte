<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Variedad extends Model
{
    protected $table      = 'variedad';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion'];

	public function siembras()
    {
        return $this->hasMany(App\Siembra::class,'codigo_variedad','codigo');
    }
}
