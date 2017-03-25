<?php 

namespace App\Http\Transformers;

use League\Fractal;
use App\Visita;
class VisitasCollectionTransformer extends Fractal\TransformerAbstract {

	/**
	 * Inclusiones disponibles al item
	 * @var Array
	 */
	protected $availableIncludes = [
		'agronomo',
	];

	/**
	 * Exclusiones disponibles al item
	 * @var Array
	 */
	protected $availableExcludes = [
		'agronomo',
	];
	/**
	 * Incluye por defecto a la respuesta el agronomo
	 * @var Array
	 */
	protected $defaultIncludes = ['agronomo'];
	/**
	 * Método de transformación de la información de una visita
	 * cuando es consultado de forma paginada
	 * @param  Visita $visita Visita
	 * @return Array             transformer
	 */
	public function transform(Visita $visita) {
		return [
			'codigo'           => (int) $visita->codigo,
			'codigo_siembra'   => $visita->codigo_siembra,
			'fecha'            => $visita->fecha,
			'id_agronomo'      => $visita->agronomo,
			'id_lote'          => $visita->siembra->lote->codigo,
			'vereda'           => $visita->siembra->lote->vereda,
			'punto_referencia' => $visita->siembra->punto_referencia,
			'zona'             => $visita->siembra->lote->zona->descripcion,
			'municipio'        => $visita->siembra->lote->zona->ciudad->municipio->descripcion,
		];
	}

	public function includeAgronomo(Visita $visita) {
		$agronomo = $visita->agronomoItem;
		if (is_null($agronomo)) {
			return $this->null();
		}
		return $this->item($agronomo, new UsuarioTransformer);
	}

}