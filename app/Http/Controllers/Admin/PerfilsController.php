<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PerfilRequest;
use App\Http\Resources\PerfilsResource;
use App\Repositories\PerfilRepository;
use Illuminate\Http\Request;

class PerfilsController extends Controller
{
    private $perfil;

    public function __construct(PerfilRepository $model)
    {
        $this->perfil = $model;
    }

    public function index()
    {
        $perfils = $this->perfil->buscarTodosPerfil();
        return PerfilsResource::collection($perfils);
    }

    public function buscarPerfilPorId($id)
    {
        $perfil = $this->perfil->buscarPerfilPorId($id);
        return new PerfilsResource($perfil);
    }

    public function store(PerfilRequest $request)
    {
        $perfil = $this->perfil->criarPerfil($request->validated());
        return new PerfilsResource($perfil);
    }

    public function deletarPerfil($id)
    {
        $perfil = $this->perfil->deletarPerfil($id);
        return $perfil;
    }
}
