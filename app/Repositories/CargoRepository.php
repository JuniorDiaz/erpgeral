<?php

namespace App\Repositories;

use App\Models\Cargos;

class CargoRepository
{
    protected $model;

    public function __construct(Cargos $model)
    {
        $this->model = $model;
    }

    public function criarCargo(array $data)
    {
        return $this
            ->model
            ->create($data);
    }

    public function buscarCargoFiltro(array $filtros)
    {
        return $this
            ->model
            ->when($filtros == 'nome', function ($query, $filtros) {
                $query->where('nome', $filtros['nome']);
            });
    }

    public function buscarCargoPorId($id)
    {
        return $this
            ->model
            ->where('cod', $id)->first();
    }

    public function buscarTodosCargo()
    {
        return $this
            ->model
            ->all();
    }

    public function deletarCargo($cod)
    {
        $this->model->where('cod', $cod)->delete();

        return response()->json(['mensagem' => 'Cargo deletado com sucesso!!!']);
    }
}
