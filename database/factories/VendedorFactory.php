<?php

namespace Database\Factories;

use App\Models\Vendedor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendedor>
 */
class VendedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = Vendedor::class;


    public function definition(): array
    {
        return [
            'nome' => fake()->name(),
            'contato' => fake()->phoneNumber(),
            'morada' => fake()->address(),
        ];
    }
}
