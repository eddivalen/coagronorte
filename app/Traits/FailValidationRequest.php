<?php

namespace App\Traits;

trait FailValidationRequest {
   /**
     * Responde con posibles errores de la validacion
     * @param  array  $errors Errores
     * @return Response         errors
     */
	public function response(array $errors) {
        return response()->json(compact('errors'), 422);
    }

}