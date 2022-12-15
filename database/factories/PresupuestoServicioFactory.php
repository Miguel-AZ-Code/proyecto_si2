<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PresupuestoServicio>
 */
class PresupuestoServicioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'presupuesto_id' => fake()->numberBetween(1, 15),
            'servicio_id' => fake()->numberBetween(1, 15),
        ];
    }
}
