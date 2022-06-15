<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CargoRequest;
use App\Http\Resources\CargosResource;
use App\Repositories\CargoRepository;
use Illuminate\Http\Request;


class CargosController extends Controller
{
    private $cargo;

    public function __construct(CargoRepository $model)
    {
        $this->cargo = $model;
    }

    public function index()
    {
        $cargos = $this->cargo->buscarTodosCargo();
        return CargosResource::collection($cargos);
    }

    public function buscarCargoPorId($id)
    {
        $cargo = $this->cargo->buscarCargoPorId($id);
        return new CargosResource($cargo);
    }

    public function store(CargoRequest $request)
    {
        $cargo = $this->cargo->criarCargo($request->validated());
        return new CargosResource($cargo);
    }

    public function deletarCargo($id)
    {
        $cargo = $this->cargo->deletarCargo($id);
        return $cargo;
    }
}
