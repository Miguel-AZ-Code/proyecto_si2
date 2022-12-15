<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
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
            'ubicacion' => fake()->streetAddress(),
            'fecha_inicio' => fake()->date(),
            'fecha_fin' => fake()->date(),
            'estado' => fake()->numberBetween(0, 1),
            'empleado_id' => fake()->numberBetween(1, 15),
        ];
    }
}
