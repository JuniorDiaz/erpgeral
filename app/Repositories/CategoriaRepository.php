<?php

namespace App\Repositories;

use App\Models\Categorias;

class CategoriaRepository
{
    protected $model;

    public function __construct(Categorias $model)
    {
        $this->model = $model;
    }

    public function criarCategoria(array $data)
    {
        return $this
            ->model
            ->create($data);
    }

    public function buscarCategoriaFiltro(array $filtros)
    {
        return $this
            ->model
            ->when($filtros == 'nome', function ($query, $filtros) {
                $query->where('nome', $filtros['nome']);
            });
    }

    public function buscarCategoriaPorId($id)
    {
        return $this
            ->model
            ->where('id', $id)->first();
    }

    public function buscarTodosCategoria()
    {
        return $this
            ->model
            ->all();
    }

    public function deletarCategoria($id)
    {
        $this->model->where('id', $id)->delete();

        return response()->json(['mensagem' => 'Categoria deletado com sucesso!!!']);
    }
}
