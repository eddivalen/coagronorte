<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table      = 'codigo';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion','codigo_ciudad'];

	public function ciudad()
    {
        return $this->belongsTo(App\Ciudad::class,'codigo_ciudad','codigo');
    }
    public function lotes()
    {
        return $this->hasMany(App\Lote::class,'codigo_zona','codigo');
    }
}
