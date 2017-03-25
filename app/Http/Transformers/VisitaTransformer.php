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
	 * Incluye por defecto al agronomo
	 * @var Array
	 */
	protected $defaultIncludes = ['agronomo'];

	/**
	 * Método de transformación de la respuesta
	 * @param  Visita $visita visita
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
	 * Incluye al agronomo de la siembra en caso de tenerlo
	 * @param  Visita $visita Visita
	 * @return Fractal\Item             Agronomo transformado
	 */
	public function includeAgronomo(Visita $visita) {
		$agronomo = $visita->agronomo;
		if (is_null($agronomo)) {
			return $this->null();
		}
		return $this->item($agronomo, new UsuarioTransformer);
	}
	/**
	 * Incluye a la siembra en caso de tenerlo
	 * @param  Visita $visita Visita
	 * @return Fractal\Item             Siembra transformado
	 */
	public function includeSiembra(Visita $visita){
		$siembra = $visita->siembra;
		if (is_null($siembra)) {
			return $this->null();
		}
		return $this->item($siembra, new SiembraTransformer);
	}
	/**
	 * Incluye al lote en caso de tenerlo
	 * @param  Visita $visita Visita
	 * @return Fractal\Item             LOte transformado
	 */
	public function includeLote(Visita $visita){
		$lote = $visita->lote;
		if (is_null($lote)) {
			return $this->null();
		}
		return $this->item($lote, new SiembraTransformer);
	}
}