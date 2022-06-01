<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;

    protected $fillable = [
        'cod',
        'tipopessoa',
        'nome',
        'telefone',
        'cpfcnpj',
        'pais',
        'estado',
        'cidade',
        'logradouro',
        'endereco',
        'numero',
        'cep',
        'email',
    ];
}
