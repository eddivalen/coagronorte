<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\Traits\FailValidationRequest;

class HolaRequest extends FormRequest
{
    use FailValidationRequest;
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
}
