<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUsuarioRequest extends FormRequest
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
            'cedula' => 'required|unique:usuarios,cedula',
            'nombre_usuario' => 'required|unique:usuarios,nombre_usuario',
            'correo_electronico' => 'required|email|unique:usuarios,correo_electronico',
            'nombre' => 'required|string|max:50',
            'apellido' => 'required|string|max:50',
            'telefono' => 'required|string|max:50',
            'fecha_inscripcion'=> 'date',
        ];
    }
     public function response(array $errors) {
        return response()->json(compact('errors'), 422);
    }
}
