<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'ci' => '14785214',
            'name' => 'Admin',
            'telefono' => '+59178451236',
            'email' => 'admin@insuconsadmin.com',
            'password' => Hash::make('password'),
        ])->assignRole('Admin');

        User::create([
            'ci' => fake()->unique()->randomNumber(8, true),
            'name' => 'José Andres Garcia Chavez',
            'telefono' => fake()->e164PhoneNumber(),
            'email' => 'andres@insucons.com',
            'password' => Hash::make('63489070'),
        ])->assignRole('Empleado');

        User::create([
            'ci' => fake()->unique()->randomNumber(8, true),
            'name' => 'Bebi Vargas Rios',
            'telefono' => fake()->e164PhoneNumber(),
            'email' => 'bebi@insucons.com',
            'password' => Hash::make('65036977'),
        ])->assignRole('Empleado');

        User::create([
            'ci' => fake()->unique()->randomNumber(8, true),
            'name' => 'Kasandra Mamani Rodriguez',
            'telefono' => fake()->e164PhoneNumber(),
            'email' => 'kasandra@insucons.com',
            'password' => Hash::make('77037288'),
        ])->assignRole('Empleado');

        User::create([
            'ci' => fake()->unique()->randomNumber(8, true),
            'name' => 'Gabriel Mercado Pinto',
            'telefono' => fake()->e164PhoneNumber(),
            'email' => 'gabriel@insucons.com',
            'password' => Hash::make('65849717'),
        ])->assignRole('Empleado');

        User::factory(21)->create();
    }
}
