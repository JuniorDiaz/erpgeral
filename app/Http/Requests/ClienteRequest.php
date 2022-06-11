<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'tipopessoa' => ['required'],
            'nome' => ['required', 'min:3', 'max:155'],
            'telefone' => ['min:7', 'max:20', 'unique:clientes,telefone'],
            'cpfcnpj' => ['min:10', 'max:14'],
            'pais' => ['min:5', 'max:60'],
            'estado' => ['max:2'],
            'cidade' => ['min:5', 'max:100'],
            'bairro' => ['min:5', 'max:50'],
            'logradouro' => ['min:5', 'max:50'],
            'endereco' => ['min:5', 'max:80'],
            'numero' => ['max:10'],
            'cep' => ['min:10'],
            'email' => ['min:7', 'max:70']
        ];
    }
}
