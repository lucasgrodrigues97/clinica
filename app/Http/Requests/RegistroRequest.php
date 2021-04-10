<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'min:3'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo e-mail é obrigatório',
            'email.email' => 'Digite um e-mail álido',
            'password.min' => 'O campo senha tem que ter pelo menos 3 caracteres'
        ];
    }
}
