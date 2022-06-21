<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissao_perfil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('permissao_id');
            $table->unsignedBigInteger('perfil_id');

            $table->foreign('permissao_id')
                ->references('id')
                ->on('permissoes')
                ->onDelete('cascade');

            $table->foreign('perfil_id')
                ->references('id')
                ->on('perfils')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissao_perfil');
    }
};
