<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Traits\FailValidationRequest;
class ResetPasswordRequest extends FormRequest
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
       // var_dump($this->request);
        return [
            'reset_password_token'  => 'required|exists:usuarios,reset_password_token',
             'correo_electronico'    => 'required|exists:usuarios,correo_electronico',
             'password'              => 'required|confirmed',
        ];

    }
}
