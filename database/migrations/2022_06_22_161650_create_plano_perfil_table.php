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
        Schema::create('plano_perfil', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('plano_id');
            $table->unsignedBigInteger('perfil_id');

            $table->foreign('plano_id')
                ->references('id')
                ->on('planos')
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
        Schema::dropIfExists('plano_perfil');
    }
};
