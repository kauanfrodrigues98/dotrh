<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBeneficiosRequest extends FormRequest
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
            'nome_beneficio' => 'required|unique:beneficios,nome_beneficio',
            'tipo_beneficio' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome_beneficio.required' => 'O nome do beneficio deve ser informado.',
            'tipo_beneficio.required' => 'Tipo do beneficio deve ser informado',
            'nome_beneficio.unique' => 'Beneficio já cadastrado.'
        ];
    }
}
