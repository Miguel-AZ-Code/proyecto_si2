<?php

namespace Database\Seeders;

use App\Models\Metododepago;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PagoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Metododepago::create([
            'nombre' => 'VISA',

        ]);
    }
}
