<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\CargosController;
use App\Http\Controllers\Admin\PerfilsController;

Route::controller(ClientesController::class)->group(function () {
    Route::get('/clientes','index');
    Route::get('/clientes/{id}','buscarClientePorId');
    Route::post('/clientes','store');
    Route::delete('/clientes/{cod}','deletarCliente');
});
Route::controller(CargosController::class)->group(function () {
    Route::get('/cargos','index');
    Route::get('/cargos/{id}','buscarCargoPorId');
    Route::post('/cargos','store');
    Route::delete('/cargos/{id}','deletarCargo');
});
Route::controller(PerfilsController::class)->group(function () {
    Route::get('/perfils','index');
    Route::get('/perfils/{id}','buscarPerfilPorId');
    Route::post('/perfils','store');
    Route::delete('/perfils/{id}','deletarPerfil');
});

