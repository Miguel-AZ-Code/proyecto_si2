<?php

namespace Database\Seeders;

use App\Models\Presupuesto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresupuestoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presupuesto::create([
            'descripcion' => '14785214',
            'precio' => '10',



        ]);
    }
}
