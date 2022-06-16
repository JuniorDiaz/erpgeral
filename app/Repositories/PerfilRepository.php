<?php

namespace App\Repositories;

use App\Models\Perfils;

class PerfilRepository
{
    protected $model;

    public function __construct(Perfils $model)
    {
        $this->model = $model;
    }

    public function criarPerfil(array $data)
    {
        return $this
            ->model
            ->create($data);
    }

    public function buscarPerfilFiltro(array $filtros)
    {
        return $this
            ->model
            ->when($filtros == 'nome', function ($query, $filtros) {
                $query->where('nome', $filtros['nome']);
            });
    }

    public function buscarPerfilPorId($id)
    {
        return $this
            ->model
            ->where('id', $id)->first();
    }

    public function buscarTodosPerfil()
    {
        return $this
            ->model
            ->all();
    }

    public function deletarPerfil($id)
    {
        $this->model->where('id', $id)->delete();

        return response()->json(['mensagem' => 'Perfil deletado com sucesso!!!']);
    }
}
