<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientesController;

Route::controller(ClientesController::class)->group(function () {
    Route::get('/clientes','index');
    Route::get('/clientes/{id}','buscarClientePorId');
    Route::post('/clientes','store');
    Route::delete('/clientes/{cod}','deletarCliente');
});

