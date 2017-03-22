<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailValidationRequest;
class ListadoSiembraRequest extends FormRequest
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
            'municipio'   =>'exists:municipios,codigo|numeric'
            'zona'        =>'exists:zonas,codigo|numeric',
            'vereda'      =>'string|max:50',
            'propietario' =>'exists:usuarios,cedula|string|max:50',
        ];
    }
}
