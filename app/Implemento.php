<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Implemento extends Model
{
    protected $table      = 'implementos';
	protected $primaryKey = 'cod';
	public $timestamps    = false;
	protected $fillable   = ['cod','descripcion'];

	public function detalles_implementos()
    {
        return $this->hasMany(DetalleImplemento::class,'codigo_implementos','cod');
    }

}
