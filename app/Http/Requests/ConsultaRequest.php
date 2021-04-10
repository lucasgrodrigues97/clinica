<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ConsultaRequest extends FormRequest
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
            'dados_consulta' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'dados_consulta.required' => 'O campo dados da consulta precisa ser preenchido'
        ];
    }
}
