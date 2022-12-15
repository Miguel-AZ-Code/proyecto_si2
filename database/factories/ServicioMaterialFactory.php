<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ServicioMaterial>
 */
class ServicioMaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'servicio_id' => fake()->numberBetween(1, 15),
            'materiale_id' => fake()->numberBetween(1, 15),
        ];
    }
}
