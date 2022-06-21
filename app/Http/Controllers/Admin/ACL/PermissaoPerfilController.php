<?php

namespace App\Http\Controllers\Admin\ACL;

use App\Http\Controllers\Controller;
use App\Http\Resources\PermissaoResources;
use App\Models\Perfils;
use App\Models\Permissoes;
use Illuminate\Http\Request;

class PermissaoPerfilController extends Controller
{
    protected $perfil, $permissao;

    public function __construct(Perfils $perfil, Permissoes $permissao)
    {
        $this->perfil = $perfil;
        $this->permissao = $permissao;
    }

    public function permissao($idPerfil)
    {
        $perfil = $this->perfil->find($idPerfil);
        if (!$perfil) {
            return response()->json(['data' => 'Perfil não encontrado'], 404);
        }

        $permissao = $perfil->permissoes()->paginate(15);

        return PermissaoResources::collection($permissao);
    }

    public function attachPermissionProfile(Request $request, $idPerfil)
    {
        if (!$profile = $this->perfil->find($idPerfil)) {
            return response()->json(['data' => 'Perfil não encontrado'], 404);
        }

        if (!$request->permissao || count($request->permissao) == 0) {
            return response()->json(['data' => 'Precisa escolher uma permissão']);
        }

        $profile->permissoes()->attach($request->permissao);

        return  response()->json(['data' => 'Permissão adicionado ao perfil'], 202);
    }

    public function detachPermissionProfile($idPerfil, $idPermissao)
    {
        $perfil = $this->perfil->find($idPerfil);
        $permission = $this->permissao->find($idPermissao);

        if (!$perfil || !$permission) {
            return response()->json(['data' => 'Perfil não encontrado'], 404);
        }

        $perfil->permissoes()->detach($permission);
        return response()->json(['data' => 'Permissão removido do perfil'], 202);
    }
}
