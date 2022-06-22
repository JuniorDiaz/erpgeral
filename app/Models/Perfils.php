<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\UuidTrait;

class Perfils extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $keyType = 'uuid';

    protected $fillable = [
        'nome',
        'descricao',
    ];

    public function permissoes()
    {
        return $this->belongsToMany(Permissoes::class,'permissao_perfil','perfil_id','permissao_id');
    }
    public function planos()
    {
        return $this->belongsToMany(Planos::class,'plano_perfil','perfil_id','plano_id');
    }
}
