<?php

namespace Database\Seeders;

use App\Models\Aluguer;
use App\Models\Cliente;
use App\Models\Filme;
use App\Models\Genero;
use App\Models\User;
use App\Models\Vendedor;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Cliente::factory(20)->create();
        User::factory(20)->create();
        Vendedor::factory(5)->create();
        Genero::factory(11)->create();
        Filme::factory(20)->create();
        Aluguer::factory(30)->create();



         User::factory()->create([
             'name' => 'CarmemZ',
             'email' => 'carmem@example.com',              //Para fazer login uso esse email e senha "password"
         ]);
    }
}
