<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClientesResource;
use App\Models\Clientes;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    private $cliente;

    public function __construct(Clientes $clientes)
    {
        $this->cliente = $clientes;
    }

    public function index()
    {
        $clientes = $this->cliente->all();
        return ClientesResource::collection($clientes);
    }
}
