<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailValidationRequest;
class UpdatePlantillaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'codigo_actividad'  => 'exists:actividades,codigo|numeric',
            'ciclo_dias_conteo' => 'numeric',
            'dias_alerta'       => 'numeric',
        ];
    }
}
