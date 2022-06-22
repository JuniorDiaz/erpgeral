<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Resources\PlanoResources;
use App\Models\Perfils;
use App\Models\Planos;
use Illuminate\Http\Request;

class PlanoPerfilController extends Controller
{
    protected $perfil, $plano;

    public function __construct(Perfils $perfil, Planos $plano)
    {
        $this->perfil = $perfil;
        $this->plano = $plano;
    }

    public function plano($idPerfil)
    {
        $perfil = $this->perfil->find($idPerfil);
        if (!$perfil) {
            return response()->json(['data' => 'Perfil não encontrado'], 404);
        }

        $plano = $perfil->planos()->paginate(10);

        return PlanoResources::collection($plano);
    }

    public function attachPlanoProfile(Request $request, $idPerfil)
    {
        if (!$profile = $this->perfil->find($idPerfil)) {
            return response()->json(['data' => 'Perfil não encontrado'], 404);
        }

        if (!$request->plano || count($request->plano) == 0) {
            return response()->json(['data' => 'Precisa escolher um plano']);
        }

        $profile->permissoes()->attach($request->plano);

        return  response()->json(['data' => 'Plano adicionado ao perfil'], 202);
    }

    public function detachPlanoProfile($idPerfil, $idPlano)
    {
        $perfil = $this->perfil->find($idPerfil);
        $plano = $this->plano->find($idPlano);

        if (!$perfil || !$plano) {
            return response()->json(['data' => 'Perfil ou plano não encontrado'], 404);
        }

        $perfil->permissoes()->detach($permission);
        return response()->json(['data' => 'Plano removido do perfil'], 202);
    }
}
