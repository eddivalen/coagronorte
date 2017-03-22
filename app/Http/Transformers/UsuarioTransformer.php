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
			'cedula'             => $usuario->cedula,
			'correo_electronico' => $usuario->correo_electronico,
			'nombre'             => $usuario->nombre,
			'apellido'           => $usuario->apellido,
			'telefono'           => $usuario->telefono,
		];
	}
}
