<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome_completo' => 'required',
            'email'         => 'required|email:rfc,dns',
            'data_nascimento' => 'required|date',
            'sexo'              => 'required',
            'estado_civil'      => 'required',
            'pep'               => 'required',
            'cep'               => 'required',
            'logradouro'        => 'required',
            'numero'            => 'required',
            'bairro'            => 'required',
            'cidade'            => 'required',
            'uf'            => 'required',
            'cpf'               => 'required|unique:user,cpf',
            'rg'                => 'required',
            'orgao_emissor'     => 'required',
            'data_emissao'      => 'required',
            'possui_cnh'      => 'required',
            'pis_pasep'      => 'required',
            'numero_ctps'      => 'required',
            'serie_ctps'      => 'required',
            'uf_ctps'      => 'required',
            'data_emissao_ctps'      => 'required|date',
            'cartao_sus'      => 'required',
            'lider'      => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nome_completo.required' => 'Você deve informar um nome.',
            'email.required' => 'Você deve informar um e-mail.',
            'email.email' => 'E-mail contém um formato inválido.',
            'data_nascimento.required' => 'Data de nascimento deve ser informada.',
            'data_nascimento.date' => 'Data de nascimento possui um formato inválido.',
            'sexo.required' => 'Sexo deve ser informado.',
            'estado_civil.required' => 'Estado civil deve ser informado.',
            'pep.required' => 'Estado civil deve ser informado.',
            'cep.required' => 'Estado civil deve ser informado.',
            'logradouro.required' => 'Estado civil deve ser informado.',
            'bairro.required' => 'Estado civil deve ser informado.',
            'cidade.required' => 'Estado civil deve ser informado.',
            'uf.required' => 'Estado civil deve ser informado.',
            'cpf.required' => 'Estado civil deve ser informado.',
            'rg.required' => 'Estado civil deve ser informado.',
            'orgao_emissor.required' => 'Estado civil deve ser informado.',
            'data_emissao.required' => 'Estado civil deve ser informado.',
            'possui_cnh.required' => 'Estado civil deve ser informado.',
            'pis_pasep.required' => 'Estado civil deve ser informado.',
            'numero_ctps.required' => 'Estado civil deve ser informado.',
            'serie_ctps.required' => 'Estado civil deve ser informado.',
            'uf_ctps.required' => 'Estado civil deve ser informado.',
            'data_emissao_ctps.required' => 'Estado civil deve ser informado.',
            'cartao_sus.required' => 'Estado civil deve ser informado.',
            'lider.required' => 'Você deve informar se o usuário irá assumir papel de lider.',

        ];
    }
}
