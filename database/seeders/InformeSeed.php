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
            'Titulo' => '14785214',
            'Descripcion' => '1',
            'fecha' => date('Y-m-d H:i:s'),


        ]);
    }
}
