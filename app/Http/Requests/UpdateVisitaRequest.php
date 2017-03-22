<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailValidationRequest;
class UpdateVisitaRequest extends FormRequest
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
            'codigo_siembra'         =>'exists:siembras,codigo|numeric',
            'fecha'                  =>'date',
            'presesencia_agricultor' =>'boolean',
            'registro_ausencia'      =>'string|max:4000',
            'validado'               =>'boolean',
            'valoracion'             =>'numeric',
            'opinion'                =>'string|max:4000',
            'agronomo'               =>'string|max:50',
            'archivo'                =>'string|max:50',
        ];
    }
}
