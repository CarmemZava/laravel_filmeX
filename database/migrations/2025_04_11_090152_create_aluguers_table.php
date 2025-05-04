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
        Schema::create('aluguers', function (Blueprint $table) {
            $table->id();
            $table->date('data_aluguer');
            $table->date('data_devolucao')->nullable();;
            $table->unsignedBigInteger('idCliente');
            $table->unsignedBigInteger('idFilme');
            $table->timestamps();

            //idCliente e idFilme serão as chaves estrangeiras que vem de Cliente e Filme, a referência(atributo) nas tableas primárias  é 'id'.
            $table->foreign('idCliente')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('idFilme')->references('id')->on('filmes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aluguers');
    }
};
