<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePlantillaRequest extends FormRequest
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
            'codigo_actividad'  => 'required|exists:actividades,codigo|numeric',
            'ciclo_dias_conteo' => 'required|numeric',
            'dias_alerta'       => 'required|numeric',
        ];
    }
    public function response(array $errors) {
        return response()->json(compact('errors'),422);
    }
}
