<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\CargosController;

Route::controller(ClientesController::class)->group(function () {
    Route::get('/clientes','index');
    Route::get('/clientes/{id}','buscarClientePorId');
    Route::post('/clientes','store');
    Route::delete('/clientes/{cod}','deletarCliente');
});
Route::controller(CargosController::class)->group(function () {
    Route::get('/cargos','index');
    Route::get('/cargos/{id}','buscarClientePorId');
    Route::post('/cargos','store');
    Route::delete('/cargos/{cod}','deletarCliente');
});

