<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissaoRequest;
use App\Http\Resources\PermissoesResource;
use App\Repositories\PermissaoRepository;
use Illuminate\Http\Request;

class PermissoesController extends Controller
{
    private $permissao;

    public function __construct(PermissaoRepository $model)
    {
        $this->permissao = $model;
    }

    public function index()
    {
        $permissoes = $this->permissao->buscarTodosPermissao();
        return PermissoesResource::collection($permissoes);
    }
    public function buscarPermissaoPorId($id)
    {
        $permissao = $this->permissao->buscarPermissaoPorId($id);
        return new PermissoesResource($permissao);
    }

    public function store(PermissaoRequest $request)
    {
        $permissao = $this->permissao->criarPermissao($request->validated());
        return new PermissoesResource($permissao);
    }

    public function deletarPermissao($id)
    {
        $permissao = $this->permissao->deletarPermissao($id);
        return $permissao;
    }
}
