<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEquipamentosRequest extends FormRequest
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
            'nome_equipamento' => 'required|max:150',
            'valor_equipamento' => 'required',
            'tipo_equipamento' => 'required',
            'outro_tipo_equipamento' => 'required_if:tipo_equipamento,11',
            'tag_identificacao' => 'required|unique:equipamentos,tag_identificacao'
        ];
    }

    public function messages()
    {
        return [
            'nome_equipamento.required' => 'Nome do equipamento deve ser informado.',
            'nome_equipamento.max' => 'Nome do equipamento excede os 150 caracteres.',
            'valor_equipamento.required' => 'Valor do equipamento deve ser informado.',
            'tipo_equipamento.required' => 'Tipo do equipamento deve ser especificado.',
            'outro_tipo_equipamento.required_if' => 'O campo outro tipo de equipamento deve ser especificado.',
            'tag_identificacao.required' => 'Uma tag de identificação do equipamento deve ser informada.',
            'tag_identificacao.unique' => 'TAG de identificação já cadastrada.',
        ];
    }
}
