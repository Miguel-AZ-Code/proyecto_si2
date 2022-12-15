<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Medida;
use App\Models\Servicio;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Cliente::factory(15)->create();
        \App\Models\Presupuesto::factory(15)->create();
        \App\Models\Servicio::factory(15)->create();
        \App\Models\Informe::factory(15)->create();
        \App\Models\Empleado::factory(15)->create();
        \App\Models\Proyecto::factory(15)->create();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,

            MetodoSeeder::class,
            MedidaSeeder::class,
        ]);
        \App\Models\Factura::factory(15)->create();
        \App\Models\Contrato::factory(15)->create();
        \App\Models\PresupuestoServicio::factory(60)->create();
        \App\Models\Documento::factory(15)->create();
        \App\Models\Proveedore::factory(15)->create();
        \App\Models\Materiale::factory(15)->create();
        \App\Models\ServicioMaterial::factory(15)->create();
        \App\Models\Entrada::factory(15)->create();
        \App\Models\Salida::factory(15)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
