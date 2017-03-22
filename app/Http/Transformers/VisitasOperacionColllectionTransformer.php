<?php 
namespace App\Http\Transformers;

use League\Fractal;

use App\Visita;

class VisitaOperacionCollectionTransformer extends Fractal\TransformerAbstract {

	protected $defaultIncludes = ['visita'];
	public function transform(visitaOperacion $visitaOperacion) {
		return [
			'tipo' => $imagen->tipo,
		];
	}
	public function includeSiembra(Visita_operacion $visitaOperacion) {
		$visita = $inmuebleOperacion->visita;
		return $this->item($visita, new InmuebleTransformer);
	}

}

