<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClienteRequest;
use App\Http\Resources\ClientesResource;
use App\Repositories\ClienteRepository;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    private $cliente;

    public function __construct(ClienteRepository $model)
    {
        $this->cliente = $model;
    }

    public function index()
    {
        $clientes = $this->cliente->buscarTodosCliente();
        return ClientesResource::collection($clientes);
    }

    public function buscarClientePorId($id)
    {
        $cliente = $this->cliente->buscarClientePorId($id);
        return new ClientesResource($cliente);
    }

    public function store(ClienteRequest $request)
    {
        $cliente = $this->cliente->criarCliente($request->validated());
        return new ClientesResource($cliente);
    }

    public function deletarCliente($cod)
    {
        $cliente = $this->cliente->deletarCliente($cod);
        return $cliente;
    }
}
