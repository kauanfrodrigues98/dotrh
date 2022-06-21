<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDepartamentosRequest extends FormRequest
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
            'departamento' => 'required|unique:departamentos,nome_departamento'
        ];
    }

    public function messages()
    {
        return [
            'departamento.required' => 'Você deve informar o nome do departamento.',
            'departamento.unique' => 'Departamento já existe em nosso sistema.'
        ];
    }
}
