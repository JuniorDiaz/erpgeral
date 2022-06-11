<?php

namespace App\Repositories;

use App\Models\Clientes;

class ClienteRepository
{
    protected $model;

    public function __construct(Clientes $model)
    {
        $this->model = $model;
    }

    public function criarCliente(array $data)
    {
        return $this
            ->model
            ->create($data);
    }

    public function buscarClienteFiltro(array $filtros)
    {
        return $this
            ->model
            ->when($filtros == 'nome', function ($query, $filtros) {
                $query->where('nome', $filtros['nome']);
            })
            ->when($filtros == 'telefone', function ($query, $filtros) {
                $query->where('telefone', $filtros['telefone']);
            })
            ->when($filtros == 'cpfcnpj', function ($query, $filtros) {
                $query->where('cpfcnpj', $filtros['cpfcnpj']);
            })->get();
    }

    public function buscarClientePorId($id)
    {
        return $this
            ->model
            ->where('cod', $id)->first();
    }

    public function buscarTodosCliente()
    {
        return $this
            ->model
            ->all();
    }

    public function deletarCliente($cod)
    {
        $this->model->where('cod', $cod)->delete();

        return response()->json(['mensagem' => 'Cliente deletado com sucesso!!!']);
    }
}
