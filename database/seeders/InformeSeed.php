<?php

namespace Database\Seeders;

use App\Models\Informe;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformeSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Informe::create([
            'Titulo' => 'INFORME 1',
            'Descripcion' => '1111111111111',
            'fecha' => date('Y-m-d H:i:s'),
            'proyecto_id'=>1


        ]);
        Informe::create([
            'Titulo' => 'INFORME 2',
            'Descripcion' => 'XDDXDXDXDXDD',
            'fecha' => date('Y-m-d H:i:s'),
            'proyecto_id'=>1


        ]);
    }
}
