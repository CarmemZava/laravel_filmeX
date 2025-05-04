<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluguer extends Model
{
    /** @use HasFactory<\Database\Factories\AluguerFactory> */
    use HasFactory;

    protected $fillable = [
        'data_aluguer',
        'data_devolucao',
        'idCliente',
        'idFilme'
    ];
    //ATENÇÃO: O NOME DA FUNÇÃO TEM QUE SER PLURAL AO NOME DA TABELA, OU SEJA, EXATAMENTE O QUE VAI APARECER NO MYSQL
    public function clientes(){
        return $this->belongsTo(Cliente::class,'idCliente');              //Quer dizer que toda instancia aluguer pertence a uma instancia Cliente e o "denominador" em comum é o idCliente
                                                                          //muitas (aluguers) para 1 cliente

    }

    public function filmes(){
        return $this->belongsTo(Filme::class,'idFilme');              //Quer dizer que toda instancia aluguer pertence a uma instancia Filme e o "denominador" em comum é o idFilme
                                                                          //muitas (aluguers) para 1 filme

    }
}
