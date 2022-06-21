<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\CargosController;
use App\Http\Controllers\Admin\ACL\PerfilsController;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\ACL\PermissoesController;
use App\Http\Controllers\Admin\ACL\PermissaoPerfilController;

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
Route::controller(CategoriasController::class)->group(function () {
    Route::get('/categorias','index');
    Route::get('/categorias/{id}','buscarCategoriaPorId');
    Route::post('/categorias','store');
    Route::delete('/categorias/{id}','deletarCategoria');
});
Route::controller(PermissoesController::class)->group(function () {
    Route::get('/permissoes','index');
    Route::get('/permissoes/{id}','buscarPermissaoPorId');
    Route::post('/permissoes','store');
    Route::delete('/permissoes/{id}','deletarPermissoes');
});

Route::controller(PermissaoPerfilController::class)->group(function () {
    Route::get('perfil/{id}/permissao','permissao');
    Route::post('perfil/{id}/permissao/store', 'attachPermissionProfile');
    Route::get('perfil/{id}/permissao/{idPermission}/detach', 'detachPermissionProfile');
});

