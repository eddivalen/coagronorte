<?php 

namespace App\Http\Transformers;

use League\Fractal;
use App\Lote;
use App\Usuario;
use App\Siembra;
class ProgramarVisitaCollectionTransformer extends Fractal\TransformerAbstract {

	/**
	 * Inclusiones disponibles al item
	 * @var Array
	 */
	protected $availableIncludes = [
		'propietario','siembra',
	];

	/**
	 * Exclusiones disponibles al item
	 * @var Array
	 */
	protected $availableExcludes = [
		'propietario','siembra',
	];
	/**
	 * Incluye por defecto a la respuesta el propietario del inmueble
	 * @var Array
	 */
	protected $defaultIncludes = ['propietario','siembra'];
	/**
	 * Método de transformación de la información de una lote
	 * cuando es consultado de forma paginada
	 * @param  lote $lote lote
	 * @return Array             transformer
	 */
	public function transform(Lote $lote) {
		return [
			'id_lote'          => (int) $lote->codigo,
			'vereda'           => $lote->vereda,
			'punto_referencia' => $lote->punto_referencia,
			'zona'             => $lote->zona->descripcion,
			'municipio'        => $lote->zona->ciudad->municipio->descripcion,
		];
	}

	public function includePropietario(Lote $lote) {
		$propietario = $lote->propietarioItem;
		if (is_null($propietario)) {
			return $this->null();
		}
		return $this->item($propietario, new UsuarioTransformer);
	}
	public function includeSiembra(Lote $lote_s){
		$siembra_s = $lote_s->siembrasItem;
		if (is_null($siembra_s)){
			return $this->null();
		}
		return $this->collection($siembra_s, new SiembraTransformer);
	}

}