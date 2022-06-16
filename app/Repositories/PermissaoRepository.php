<?php

namespace App\Repositories;

use App\Models\Permissoes;

class PermissaoRepository
{
    protected $model;

    public function __construct(Permissoes $model)
    {
        $this->model = $model;
    }

    public function criarPermissao(array $data)
    {
        return $this
            ->model
            ->create($data);
    }
    public function buscarPermissaoFiltro(array $filtros)
    {
        return $this
            ->model
            ->when($filtros == 'nome', function ($query, $filtros) {
                $query->where('nome', $filtros['nome']);
            });
    }

    public function buscarPermissaoPorId($id)
    {
        return $this
            ->model
            ->where('id', $id)->first();
    }

    public function buscarTodosPermissao()
    {
        return $this
            ->model
            ->all();
    }

    public function deletarPermissao($id)
    {
        $this->model->where('id', $id)->delete();

        return response()->json(['mensagem' => 'Permissao deletada com sucesso!!!']);
    }
}
