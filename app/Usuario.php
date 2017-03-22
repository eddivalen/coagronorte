<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Usuario extends Authenticatable
{
	protected $table      = 'usuarios';
	protected $primaryKey = 'cedula';
	public $timestamps    = false;
	public $incrementing  = false;
	protected $hidden     = ['password'];


	protected $fillable   = ['cedula','nombre_usuario','nombre','apellido','password','correo_electronico','telefono','fecha_inscripcion','codigo_tipo_usuario'];

	public function detalle_implemento(){
		return $this->belongsTo(DetalleImplemento::class, 'cedula','cedula_usuarios');
	}
	public function tipo_usuario(){
		return $this->belongsTo(TipoUsuario::class, 'codigo_tipo_usuario','codigo');
	}
	public function plantillas() {
    	return $this->belongsToMany(Plantilla::class,'detalle_plantilla','cedula','codigo')->using(DetallePlantilla::class)
            ->withPivot('cumplimiento','fecha_inicio');
    }
    public function visitas(){
        return $this->hasMany(Visita::class,'agronomo','cedula');
    }
    /**
     * Permite encriptar automaticamente la contraseña al guardar masivamente
     * @param String $password 
     */
    public function setPasswordAttribute($password) {
    	
    	$this->attributes['password'] = bcrypt($password);
    }
     /**
     * Permite almacenar el token de confirmación de correo electrónico
     * @param String $token token UUID4
     */
    public function setConfirmationTokenAttribute($token) {
        $this->attributes['confirmation_token'] = $token;
    }
}
