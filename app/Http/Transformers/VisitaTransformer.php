<?php 

namespace App\Http\Transformers;

use League\Fractal;

use App\Visita;

class VisitaTransformer extends Fractal\TransformerAbstract {

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
	 * Incluye por defecto a la respuesta el propietario del inmueble
	 * @var Array
	 */
	protected $defaultIncludes = ['agronomo'];

	/**
	 * Método de transformación de la respuesta
	 * @param  Inmueble $inmueble inmueble
	 * @return Array             transformer
	 */
	public function transform(Visita $visita) {
		return [
			'codigo'           => (int) $visita->codigo,
			'codigo_siembra'   => $visita->codigo_siembra,
			'fecha'            => $visita->fecha,
			'id_agronomo'      => $visita->agronomo,
			'punto_referencia' => $visita->siembra->punto_referencia,
			'id_lote'          =>$visita->lote->codigo,
		];
	}

	/**
	 * Incluye al propietario del inmueble en caso de tenerlo
	 * @param  Inmueble $inmueble Inmueble
	 * @return Fractar\Item             Usuario tranformado
	 */
	public function includeAgronomo(Visita $visita) {
		$agronomo = $visita->agronomo;
		if (is_null($agronomo)) {
			return $this->null();
		}
		return $this->item($agronomo, new UsuarioTransformer);
	}
	public function includeSiembra(Visita $visita){
		$siembra = $visita->siembra;
		if (is_null($siembra)) {
			return $this->null();
		}
		return $this->item($siembra, new SiembraTransformer);
	}
	public function includeLote(Visita $visita){
		$lote = $visita->lote;
		if (is_null($lote)) {
			return $this->null();
		}
		return $this->item($lote, new SiembraTransformer);
	}
}