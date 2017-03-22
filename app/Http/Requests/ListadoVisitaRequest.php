<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailValidationRequest;
class ListadoVisitaRequest extends FormRequest
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
            'tipo'=>'required|in:dia,rango',
            'dia'=>'required_if:tipo,dia|date',
            'fecha_inicio'=>'required_if:tipo,fecha_inicio|date',
            'fecha_final'=>'required_if:tipo,fecha_final|date|after:fecha_inicio',
        ];
    }
}
