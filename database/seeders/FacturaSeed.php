<?php

namespace Database\Seeders;

use App\Models\Factura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FacturaSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Factura::create([
            'nit' => '14785214',
            'fecha' => date('Y-m-d H:i:s'),
            'total' => '10',
            'pago_id' => '1',


        ]);
    }
}
