<?php

namespace Database\Factories;

use App\Models\Aluguer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aluguer>
 */
class AluguerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Aluguer::class;

    public function definition(): array
    {


        return [
            'data_aluguer' => fake()->date(),
            'data_devolucao' => fake()->date(),
            'idCliente' => \App\Models\Cliente::inRandomOrder()->first()->id,  // Seleciona um idCliente aleatório
            'idFilme' => \App\Models\Filme::inRandomOrder()->first()->id,
            //Desta forma, considerando que a tabela filme e aluguer ainda não foram preenchidas com dados, não teremos erro
            //Verifica se a contagem de filme é maior que 0, se sim, pega numeros aleatórios, se não, indica null nos campos

        ];
    }
}
