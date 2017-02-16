<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use App\Traits\FailValidationRequest;


class LoginRequest extends Request
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
            'correo_electronico' => 'required|exists:usuarios,correo_electronico',
            'password'           => 'required'
        ];
    }

    /**
     * Responde con posibles errores de la validaciom
     * @param  array  $errors Errores
     * @return Response         errors
     */
    public function response(array $errors)
    {
        return response()->json(compact('errors'), 422);
    }
}
