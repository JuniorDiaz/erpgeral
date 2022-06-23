<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\ClientesController;
use App\Http\Controllers\Admin\CargosController;
use App\Http\Controllers\Admin\ACL\PerfilsController;
use App\Http\Controllers\Admin\CategoriasController;
use App\Http\Controllers\Admin\ACL\PermissoesController;
use App\Http\Controllers\Admin\ACL\PermissaoPerfilController;
use App\Http\Controllers\Admin\ACL\PlanoPerfilController;
use App\Http\Controllers\Admin\PlanosController;
use App\Http\Controllers\Auth\AuthController;



Route::controller(AuthController::class)->group(function () {
    Route::post('/auth/register', 'store');
    Route::post('/auth/token', 'auth');
});

Route::group(['prefix' => 'v1', 'middleware' => ['auth:sanctum']], function () {

    Route::controller(ClientesController::class)->group(function () {
        Route::get('/clientes', 'index');
        Route::get('/clientes/{id}', 'buscarClientePorId');
        Route::post('/clientes', 'store');
        Route::delete('/clientes/{cod}', 'deletarCliente');
    });
    Route::controller(CargosController::class)->group(function () {
        Route::get('/cargos', 'index');
        Route::get('/cargos/{id}', 'buscarCargoPorId');
        Route::post('/cargos', 'store');
        Route::delete('/cargos/{id}', 'deletarCargo');
    });
    Route::controller(PerfilsController::class)->group(function () {
        Route::get('/perfils', 'index');
        Route::get('/perfils/{id}', 'buscarPerfilPorId');
        Route::post('/perfils', 'store');
        Route::delete('/perfils/{id}', 'deletarPerfil');
    });
    Route::controller(CategoriasController::class)->group(function () {
        Route::get('/categorias', 'index');
        Route::get('/categorias/{id}', 'buscarCategoriaPorId');
        Route::post('/categorias', 'store');
        Route::delete('/categorias/{id}', 'deletarCategoria');
    });
    Route::controller(PermissoesController::class)->group(function () {
        Route::get('/permissoes', 'index');
        Route::get('/permissoes/{id}', 'buscarPermissaoPorId');
        Route::post('/permissoes', 'store');
        Route::delete('/permissoes/{id}', 'deletarPermissoes');
    });

    Route::controller(PermissaoPerfilController::class)->group(function () {
        Route::get('perfil/{id}/permissao', 'permissao');
        Route::post('perfil/{id}/permissao/store', 'attachPermissionProfile');
        Route::get('perfil/{id}/permissao/{idPermission}/detach', 'detachPermissionProfile');
    });

    Route::controller(PlanosController::class)->group(function () {
        Route::get('/planos', 'index');
        Route::get('/planos/{id}', 'buscarPlanoPorId');
        Route::post('/planos', 'store');
        Route::delete('/planos/{id}', 'deletarPlanos');
    });
    Route::controller(PlanoPerfilController::class)->group(function () {
        Route::get('perfil/{id}/plano', 'plano');
        Route::post('perfil/{id}/plano/store', 'attachPlanoProfile');
        Route::get('perfil/{id}/plano/{idPlano}/detach', 'detachPlanoProfile');
    });
});
