<?php 

namespace App\Http\Transformers;

use League\Fractal;

use App\Usuario;

class UsuarioTransformer extends Fractal\TransformerAbstract {

	/**
	 * Método de transformación de la respuesta
	 * @param  Usuario $usuario usuario
	 * @return Array           transformer
	 */
	public function transform(Usuario $usuario) {
		return [
			'cedula'              => $usuario->cedula,
			'nombre_usuario'      => $usuario->nombre_usuario,
			'nombre'              => $usuario->nombre,
			'apellido'            => $usuario->apellido,
			'correo_electronico'  => $usuario->correo_electronico,
			'telefono'            => $usuario->telefono,
			'fecha_inscripcion'   => $usuario->fecha_inscripcion,
			'codigo_tipo_usuario' => $usuario->codigo_tipo_usuario,
			'confirmacion'        => $usuario->confimarcion
		];
	}
}
