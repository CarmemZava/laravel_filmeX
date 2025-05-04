<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genero extends Model
{
    /** @use HasFactory<\Database\Factories\GeneroFactory> */
    use HasFactory;

    protected $fillable = [
        'genero',

    ];

    //Criar a relação genero com filme
    public function filme()
    {
        return $this->hasmany(Filme::class);            //1 genero para muitos (filmes)
    }
}
