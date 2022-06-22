<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nome',
        'valor',
        'descricao',
    ];

    public function perfils()
    {
        return $this->belongsToMany(Perfils::class,'plano_perfil','plano_id','perfil_id');
    }
}
