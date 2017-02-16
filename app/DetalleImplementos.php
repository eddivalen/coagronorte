<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleImplementos extends Model
{
    protected $table      = 'detalle_implementos';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','codigo_implementos','cedula_usuarios','cantidad'];

	public function implemento(){
		return $this->belongsTo(App\Implemento::class, 'codigo_implementos','cod');
	}
	public function usuarios()
    {
        return $this->hasMany(App\Usuario::class,'cedula_usuarios','cedula');
    }

}
