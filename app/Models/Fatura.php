<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fatura extends Model
{
    protected $fillable = [
        'data',
        'idCliente',
        'totalLiquido',
        'iva',
        'total'
    ];

    //definir a relação fatura com cliente
    //deixar o nome da função parecido com o nome da tabela
    //uma variável pertencente ao Modelo faturas pode chamar a função da seguinte forma: $fatura1->clientes
    public function clientes(){
        return $this->belongsTo(Cliente::class,'idCliente');              //Quer dizer que toda instancia fatura pertence a uma instancia Cliente e o "denominador" em comum é o idCliente
                                                                          //muitas (fatura) para 1 cliente

    }

}
