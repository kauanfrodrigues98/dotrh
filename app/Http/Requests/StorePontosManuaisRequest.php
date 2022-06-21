<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePontosManuaisRequest extends FormRequest
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
//            'dia'           => 'required',
//            'hora_saida'    => 'required',
//            'hora_entrada'  => 'required',
            'motivo'        => 'required'
        ];
    }

    public function messages()
    {
        return [
//            'dia.required'          => 'Você deve informar o dia em que deseja abonar o horário.',
//            'hora_saida.required'   => 'Você deve informar o horário de saida.',
//            'hora_entrada.required' => 'Você deve informar o horário de entrada.',
            'motivo.required'       => 'Você deve informar o motivo da sua ausência.'
        ];
    }
}
