<?php

namespace Database\Seeders;

use App\Models\Contrato;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContratoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Contrato::create([
            'nombre'=>"contrato 1",
            'descripcion' => '14785214',
            'cliente_id' => '6',

            'presupuesto_id' => '1',
            'factura_id' =>1,
            'proyecto_id' =>1,

        ]);
        Contrato::create([
            'nombre'=>"contrato 2",
            'descripcion' => '14785214',
            'cliente_id' => '6',

            'presupuesto_id' => '1',
            'factura_id' =>1,
            'proyecto_id' =>1,

        ]);
        Contrato::create([
            'nombre'=>"contrato 3",
            'descripcion' => '14785214',
            'cliente_id' => '1',

            'presupuesto_id' => '1',
            'factura_id' =>1,
            'proyecto_id' =>1,

        ]);
    }
}
