<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metodos')->insert([
            'nombre' => 'Efectivo'
        ]);
        DB::table('metodos')->insert([
            'nombre' => 'Cheques'
        ]);
        DB::table('metodos')->insert([
            'nombre' => 'Tarjeta de débito'
        ]);
        DB::table('metodos')->insert([
            'nombre' => 'Tarjeta de crédito'
        ]);
        DB::table('metodos')->insert([
            'nombre' => 'Pagos móviles'
        ]);
        DB::table('metodos')->insert([
            'nombre' => 'Transferencias bancarias electrónicas'
        ]);
    }
}
