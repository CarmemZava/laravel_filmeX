<?php

namespace Database\Factories;

use App\Models\Genero;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Genero>
 */
class GeneroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     *
     */

     protected $model = Genero::class;

    public function definition(): array
    {
        return [
            'genero' => $this->faker->randomElement([           //11 elementos, tenho que considerar a quantidade ao fazer o fake idGenero na tabela filme
            'Ação',
            'Comédia',
            'Drama',
            'Terror',
            'Ficção Científica',
            'Romance',
            'Animação',
            'Documentário',
            'Suspense',
            'Aventura',
            'Fantasia',
        ]),

        ];
    }
}
