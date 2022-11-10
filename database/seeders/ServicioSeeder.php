<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->insert([
            'nombre' => 'obra de plomeria', 'descripcion' => 'instalacion del sistema de agua', 'costo' => 100,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('servicios')->insert([
            'nombre' => 'obra fina', 'descripcion' => 'instalacion del sistema de agua', 'costo' => 100,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('servicios')->insert([
            'nombre' => 'Obra de Albañileria', 'descripcion' => 'Mejoramiento, construccion', 'costo' => 150,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('servicios')->insert([
            'nombre' => 'Obra de pintado', 'descripcion' => 'pintura, mano de obra fina', 'costo' => 150,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('servicios')->insert([
            'nombre' => 'Obra de techado e impermeabilizacion', 'descripcion' => 'mejoramiento de techos', 'costo' => 150,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('servicios')->insert([
            'nombre' => 'Obra de instalación de ventanas de vidrio', 'descripcion' => 'mejoramiento, mano de obra fina', 'costo' => 150,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
