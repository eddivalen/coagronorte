<?php 

namespace App\Http\Transformers;

use League\Fractal;

use App\Siembra;

class SiembraTransformer extends Fractal\TransformerAbstract {

	/**
	 * Método de transformación de la respuesta
	 * @param  Inmueble $inmueble inmueble
	 * @return Array             transformer
	 */
	public function transform(Siembra $siembraT) {
		return [
			'codigo'      => (int) $siembraT->codigo,
			'codigo_lote' => $siembraT->codigo_lote,
			'fecha'       => $siembraT->fecha_siembra,
		];
	}

}