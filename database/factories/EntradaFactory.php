<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Entrada>
 */
class EntradaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'empleado_id' => fake()->numberBetween(1, 15),
            'proveedore_id' => fake()->numberBetween(1, 15),
            'descripcion' => fake()->sentence(),
            'fecha' => fake()->date(),
        ];
    }
}
