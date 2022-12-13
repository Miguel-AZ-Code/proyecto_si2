<?php

namespace Database\Seeders;

use App\Models\Documento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentoSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Documento::create([
            'Titulo' => 'LA MUERTE DE LOTSO',
            'URL' => 'papaoso@gmail.com',
            "contrato_id"=>1

        ]);
        Documento::create([
            'Titulo' => 'Expedientes X',
            'URL' => 'papaoso@gmail.com',
            "contrato_id"=>3

        ]);
    }
}
