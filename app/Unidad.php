<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unidad extends Model
{
    protected $table      = 'unidades';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion'];

	public function productos()
    {
        return $this->hasMany(App\Producto::class,'codigo_unidad','codigo');
    }
}
