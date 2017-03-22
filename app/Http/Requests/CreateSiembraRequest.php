<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailValidationRequest;
class CreateSiembraRequest extends FormRequest
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
            'fecha_siembra'          =>'required|date',
            'fecha_siembra_estimada' =>'required|date',
            'fecha_estimada_corta'   =>'required|date',
            'fecha_real_corta'       =>'required|date',
            'codigo_lote'            =>'required|exists:lotes,codigo|numeric',
            'dias_germinado'         =>'required|numeric',
            'hectareas'              =>'required|numeric',//decimal
            'punto_referencia'       =>'required|string|max:50',
            'sistema_preparacion'    =>'required|string|max:50',
            'codigo_tipo_semilla'    =>'required|exists:tipo_semilla,codigo|numeric',
            'codigo_variedad'        =>'required|exists:variedad,codigo|numeric',
            'codigo_tipo_siembra'    =>'required|exists:tipo_siembra,codigo|numeric',
            'arroz_rojo'             =>'in:alto,medio,bajo',
            'semilla_objetable'      =>'boolean',//binary
            'rendimiento_ha'         =>'numeric',//decimal
            'observaciones'          =>'string|max:4000',//text
        ];
    }
}
