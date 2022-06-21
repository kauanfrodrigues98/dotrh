<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePontosRequest extends FormRequest
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
            'idPonto'   => 'required',
            'dia'       => 'required',
            'hora'      => 'required',
            'motivo'    => 'required',
//            'anexos' => 'mimes:pdf,png,jpg,jpeg'
        ];
    }

    public function messages()
    {
        return [
            'idPonto.required'  => 'Desculpe não conseguimos identificar a marcação que deseja alterar.',
            'dia.required'      => 'O dia que você deseja alterar deve ser informado.',
            // 'dia.date' => 'o dia informado não é uma data válida.',
            'motivo.required'   => 'Você deve informar o motivo da sua solicitação.',
//            'anexos.mimes' => 'Tipo de anexo incorreto. Os tipos aceitos são PDF, PNG, JPG e JPEG.'
        ];
    }
}
