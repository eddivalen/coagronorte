<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    protected $table      = 'zonas';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion','codigo_ciudad'];

	public function ciudad()
    {
        return $this->belongsTo(Ciudad::class,'codigo_ciudad','codigo');
    }
    public function lotes()
    {
        return $this->hasMany(Lote::class,'codigo_zona','codigo');
    }
}
