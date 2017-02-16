<?php

namespace App\Traits;

trait FailValidationRequest {

	public function response(array $errors) {
        return response()->json(compact('errors'), 422);
    }

}