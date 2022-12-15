<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contrato>
 */
class ContratoFactory extends Factory
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
            'cliente_id' => fake()->numberBetween(1, 15),
            'proyecto_id' => fake()->numberBetween(1, 15),
            'presupuesto_id' => fake()->numberBetween(1, 15),
            'factura_id' => fake()->numberBetween(1, 15),
            'descripcion' => fake()->sentence(),
        ];
    }
}
