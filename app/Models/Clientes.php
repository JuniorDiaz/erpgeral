<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;


class Clientes extends Model
{
    use HasFactory, UuidTrait;

    public $incrementing = false;
    protected $keyType = 'cod';


    protected $fillable = [
        'tipopessoa',
        'nome',
        'telefone',
        'cpfcnpj',
        'pais',
        'estado',
        'cidade',
        'bairro',
        'logradouro',
        'endereco',
        'numero',
        'cep',
        'email' , 
    ];
}
