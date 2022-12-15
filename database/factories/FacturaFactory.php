<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Factura>
 */
class FacturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nit' => fake()->randomNumber(8, true),
            'total' => fake()->randomFloat(2, 1000, 10000),
            'fecha' => fake()->date(),
            'metodo_id' => fake()->numberBetween(1, 6),
        ];
    }
}
