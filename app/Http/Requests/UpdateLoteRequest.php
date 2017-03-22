<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailValidationRequest;
class UpdateLoteRequest extends FormRequest
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
            'vereda'               =>'string|max:50',
            'codigo_zona'          =>'exists:zonas,codigo|numeric'
            'area'                 =>'numeric',
            'propietario'          =>'string|max:50',
            'tenencia'             =>'in:propio,arriendo,vencimiento',
            'analisis_suelo'       =>'boolean',
            'fecha_analisis_suelo' =>'date',
            'pinsat'               =>'boolean',
            'planos'               =>'boolean',
            'archivo_planos'       =>'string|max:50',
            'venta'                =>'boolean',
            'asistencia_tecnica'   =>'boolean',
            'codigo_riego'         =>'exists:tipo_riegos,codigo|numeric',
            'longitud'             =>'numeric',
            'latitud'              =>'numeric',
        ];
    }
}
