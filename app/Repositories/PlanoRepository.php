<?php

namespace App\Repositories;

use App\Models\Planos;

class PlanoRepository
{
    protected $model;

    public function __construct(Planos $model)
    {
        $this->model = $model;
    }

    public function criarPlano(array $data)
    {
        return $this
            ->model
            ->create($data);
    }
    public function buscarPlanoFiltro(array $filtros)
    {
        return $this
            ->model
            ->when($filtros == 'nome', function ($query, $filtros) {
                $query->where('nome', $filtros['nome']);
            });
    }

    public function buscarPlanoPorId($id)
    {
        return $this
            ->model
            ->where('id', $id)->first();
    }

    public function buscarTodosPlano()
    {
        return $this
            ->model
            ->all();
    }

    public function deletarPlano($id)
    {
        $this->model->where('id', $id)->delete();

        return response()->json(['mensagem' => 'Plano deletado com sucesso!!!']);
    }
}
