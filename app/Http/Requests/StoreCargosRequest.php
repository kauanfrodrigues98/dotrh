<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCargosRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Gate::allows('is_admin');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'departamento' => 'required',
            'cargo' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'departamento.required' => 'Você deve selecionar um departamento.',
            'cargo' => 'Você deve informar um nome para o cargo que deseja cadastrar.'
        ];
    }
}
