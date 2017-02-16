<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    protected $table      = 'tipo_usuarios';
	protected $primaryKey = 'codigo';
	public $timestamps    = false;
	protected $fillable   = ['codigo','descripcion'];

	public function usuarios()
    {
        return $this->hasMany(App\Usuario::class,'codigo_tipo_usuario','codigo');
    }
}
