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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('plano_id'); //plano
            $table->uuid('cod');
            $table->string('cnpj')->nullable()->unique();
            $table->string('cpf')->nullable()->unique();
            $table->string('name')->unique();
            $table->string('url')->unique();
            $table->string('email')->unique();
            $table->string('logo')->nullable();


            //Status tenant se inativar perde acesso ao sistema
            $table->enum('active',['S','N'])->default('S');

            //subscription
            $table->date('subscription')->nullable(); //data assiantura
            $table->date('expires_at')->nullable(); //data que expira
            $table->string('subscription_id',191)->nullable(); //identificador do gateway
            $table->boolean('subscription_active')->default(false); //assinatura ativa
            $table->boolean('subscription_suspended')->default(false); //assinatura cancelada

            $table->timestamps();

            $table->foreign('plano_id')
                ->references('id')
                ->on('planos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
};
