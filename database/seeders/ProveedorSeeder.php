<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('proveedors')->insert([
            'nit' => '457889', 'nombre' => 'incerpaz',
            'telefono' => fake()->e164PhoneNumber(), 'direccion' => fake()->address(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('proveedors')->insert([
            'nit' => '582615', 'nombre' => 'cobras',
            'telefono' => fake()->e164PhoneNumber(), 'direccion' => fake()->address(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('proveedors')->insert([
            'nit' => '787889', 'nombre' => 'fanceza',
            'telefono' => fake()->e164PhoneNumber(), 'direccion' => fake()->address(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('proveedors')->insert([
            'nit' => '459889', 'nombre' => 'camba',
            'telefono' => fake()->e164PhoneNumber(), 'direccion' => fake()->address(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('proveedors')->insert([
            'nit' => '268712', 'nombre' => 'barraca jimenez',
            'telefono' => fake()->e164PhoneNumber(), 'direccion' => fake()->address(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('proveedors')->insert([
            'nit' => '897512', 'nombre' => 'TYC',
            'telefono' => fake()->e164PhoneNumber(), 'direccion' => fake()->address(),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
