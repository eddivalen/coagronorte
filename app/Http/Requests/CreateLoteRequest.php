<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailValidationRequest;
class CreateLoteRequest extends FormRequest
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
            'vereda'               =>'required|string|max:50',
            'codigo_zona'          =>'required|exists:zonas,codigo|numeric'
            'area'                 =>'required|numeric',
            'propietario'          =>'required|string|max:50',
            'tenencia'             =>'required|in:propio,arriendo,vencimiento',
            'analisis_suelo'       =>'required|boolean',
            'fecha_analisis_suelo' =>'required|date',
            'pinsat'               =>'required|boolean',
            'planos'               =>'required|boolean',
            'archivo_planos'       =>'required|string|max:50',
            'venta'                =>'required|boolean',
            'asistencia_tecnica'   =>'required|boolean',
            'codigo_riego'         =>'required|exists:tipo_riegos,codigo|numeric',
            'longitud'             =>'required|numeric',
            'latitud'              =>'required|numeric',
        ];
    }
}
