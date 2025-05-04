<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('faturas', function (Blueprint $table) {
            $table->id();
            $table->date('data')->nullable();
            $table->unsignedBigInteger('idCliente');          //Na tabela no mysql, o campo 'id' de cliente é bigint(20), com BigInteger não funcionou, tivemos que colocar o unsignedBigInteger
            $table->decimal('totalLiquido',7,2)->nullable();
            $table->decimal('iva',7,2)->nullable();
            $table->decimal('total',7,2)->nullable();         // 7 digitos onde 4 inteiros e 2 decimais
            $table->timestamps();

            //Criar relação entre cliente e fatura
            //idCliente será a chave estrangeira que vem de Cliente, a referência(atributo) em cliente é 'id', na tabela 'clientes'
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faturas');
    }
};
