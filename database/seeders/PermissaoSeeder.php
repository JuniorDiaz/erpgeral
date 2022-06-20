<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permissoes;

class PermissaoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        {

            Permissoes::create(['nome'=>'Clientes','descricao'=>'Cadastrar Clientes']);
            Permissoes::create(['nome'=>'Produtos','descricao'=>'Cadastrar Produtos']);
            Permissoes::create(['nome'=>'Categorias','descricao'=>'Cadastrar Categorias']);
            Permissoes::create(['nome'=>'Cargo','descricao'=>'Cadastrar Cargos']);
            Permissoes::create(['nome'=>'Perfil','descricao'=>'Cadastrar Perfil']);

        }
    }
}
