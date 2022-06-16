<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoriaRequest;
use App\Http\Resources\CategoriasResource;
use App\Repositories\CategoriaRepository;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    private $categoria;

    public function __construct(CartegoriaRepository $model)
    {
        $this->categoria = $model;
    }

    public function index()
    {
        $categorias = $this->perfil->buscarTodosPerfil();
        return CategoriasResource::collection($categorias);
    }
    public function buscarCategoriaPorId($id)
    {
        $categoria = $this->categoria->buscarCategoriaPorId($id);
        return new CategoriasResource($perfil);
    }

    public function store(CategoriaRequest $request)
    {
        $categoria = $this->categoria->criarCategoria($request->validated());
        return new CategoriasResource($categoria);
    }

    public function deletarCategoria($id)
    {
        $categoria = $this->categoria->deletarCategoria($id);
        return $categoria;
    }
}
