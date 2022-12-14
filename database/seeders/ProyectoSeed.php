<?php

namespace Database\Seeders;

use App\Models\Proyecto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProyectoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proyecto::create([
            'nombre' => '14785214',
            'estado' => '1',
            'ubicacion' => '1',
            'fecha_inicio' => date('Y-m-d H:i:s'),
            'fecha_fin' =>date('Y-m-d H:i:s'),
            'informe_id' =>1,

        ]);
    }
}
