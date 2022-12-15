<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'dni' => fake()->randomNumber(8, true),
            'nombre' => fake()->name(),
            'telefono' => fake()->e164PhoneNumber,
            'direccion' => fake()->streetAddress(),
            'salario' => fake()->randomFloat(2, 1500, 5000),
        ];
    }
}
