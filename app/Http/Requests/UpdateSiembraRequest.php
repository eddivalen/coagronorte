<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailValidationRequest;
class UpdateSiembraRequest extends FormRequest
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
            'fecha_siembra'          =>'date',
            'fecha_siembra_estimada' =>'date',
            'fecha_estimada_corta'   =>'date',
            'fecha_real_corta'       =>'date',
            'codigo_lote'            =>'exists:lotes,codigo|numeric',
            'dias_germinado'         =>'numeric',
            'hectareas'              =>'numeric',//decimal
            'punto_referencia'       =>'string|max:50',
            'sistema_preparacion'    =>'string|max:50',
            'codigo_tipo_semilla'    =>'exists:tipo_semilla,codigo|numeric',
            'codigo_variedad'        =>'exists:variedad,codigo|numeric',
            'codigo_tipo_siembra'    =>'exists:tipo_siembra,codigo|numeric',
            'arroz_rojo'             =>'in:alto,medio,bajo',
            'semilla_objetable'      =>'boolean',//binary
            'rendimiento_ha'         =>'numeric',//decimal
            'observaciones'          =>'string|max:4000',//text
        ];
    }
}
