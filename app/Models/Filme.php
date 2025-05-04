<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    /** @use HasFactory<\Database\Factories\FilmeFactory> */
    use HasFactory;

    protected $fillable = [
        'titulo',
        'idGenero',
        'duracao',
    ];

    //definir a relação filme com genero
    //deixar o nome da função parecido com o nome da tabela
    //uma variável pertencente ao Modelo filme pode chamar a função da seguinte forma: $filme1->genero
    public function generos(){
        return $this->belongsTo(Genero::class,'idGenero');              //Quer dizer que toda instancia filme pertence a uma instancia genero e o "denominador" em comum é o idGenero
                                                                        //muitas (filmes) para 1 genero

    }

    public function aluguers(){
        return $this->belongsTo(Aluguer::class,'idFilme');

    }

}
