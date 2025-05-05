<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cliente extends Model
{
    use HasFactory;
    //
    protected $fillable = [
    'nome',
    'email',
    'morada',
    'telefone',
    'data_nascimento'
];

//Criar a relação cliente com fatura
public function faturas(){
    return $this->hasmany(Fatura::class);            //1 cliente para muitos (fatura)
}

//Criar a relação cliente com aluguer
public function aluguers(){
    return $this->hasmany(Aluguer::class, 'idCliente');            //1 cliente para muitos (aluguers)
}

}
