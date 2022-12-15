<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Materiale>
 */
class MaterialeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre' => fake()->word(),
            'descripcion' => fake()->sentence(),
            'costo' => fake()->randomFloat(2, 10, 500),
            'stock' => fake()->numberBetween(1, 100),
            'medida_id' => fake()->numberBetween(1, 7),
        ];
    }
}
