<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendedor extends Model
{
    /** @use HasFactory<\Database\Factories\VendedorFactory> */
    use HasFactory;
    protected $fillable = [
        'nome',
        'contato',
        'morada'
    ];
}
