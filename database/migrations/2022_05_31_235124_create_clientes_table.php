<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->uuid('cod');
            $table->enum('tipopessoa', ['F', 'J']);
            $table->string('nome', 191);
            $table->decimal('telefone', 12, 2)->nullable();
            $table->decimal('cpfcnpj', 12, 2);
            $table->string('pais', 60)->nullable();
            $table->string('estado', 2)->nullable();
            $table->string('cidade', 100)->nullable();
            $table->string('logradouro', 50)->nullable();
            $table->string('endereco', 50)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('cep', 10)->nullable();
            $table->string('email', 70)->nullable();
            $table->unsignedBigInteger('user_id');

            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
};
