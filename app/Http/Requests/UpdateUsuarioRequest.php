<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailValidationRequest;
class UpdateUsuarioRequest extends FormRequest
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
            'cedula'              => 'unique:usuarios,cedula',
            'nombre_usuario'      => 'unique:usuarios,nombre_usuario',
            'correo_electronico'  => 'email|unique:usuarios,correo_electronico',
            'nombre'              => 'string|max:50',
            'apellido'            => 'string|max:50',
            'telefono'            => 'string|max:50',
            'fecha_inscripcion'   => 'date',
            'codigo_tipo_usuario' => 'unique:tipo_usuarios,codigo_tipo_usuario',
        ];
    }
}