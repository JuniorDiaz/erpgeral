<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PlanoRequest;
use App\Http\Resources\PlanosResource;
use App\Repositories\PlanoRepository;
use Illuminate\Http\Request;

class PlanosController extends Controller
{
    private $plano;

    public function __construct(PlanoRepository $model)
    {
        $this->plano = $model;
    }

    public function index()
    {
        $planos = $this->plano->buscarTodosPlano();
        return PlanosResource::collection($planos);
    }
    public function buscarPlanoPorId($id)
    {
        $plano = $this->plano->buscarPlanoPorId($id);
        return new PlanosResource($plano);
    }

    public function store(PlanoRequest $request)
    {
        $plano = $this->plano->criarPlano($request->validated());
        return new PlanosResource($plano);
    }

    public function deletarPlano($id)
    {
        $plano = $this->plano->deletarPlano($id);
        return $plano;
    }
}
