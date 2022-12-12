<?php

namespace Tests\Feature;

use App\Models\Servicio;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiciosTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test marca.
     *
     * @test
     */
    public function can_get_all_servicios()
    {
        $servicios = Servicio::factory(4)->create();

        $this->getJson(route('servicios.index'))
            ->assertJsonFragment([
                'nombre' => $servicios[0]->nombre,
                'descripcion' => $servicios[0]->descripcion,
                'costo' => $servicios[0]->costo
            ])->assertJsonFragment([
                'nombre' => $servicios[1]->nombre,
                'descripcion' => $servicios[1]->descripcion,
                'costo' => $servicios[1]->costo
            ]);
    }

    /**
     * @test
     */
    public function can_get_one_servicio()
    {
        $servicio = Servicio::factory()->create();

        $this->getJson(route('servicios.show', $servicio))
            ->assertJsonFragment([
                'nombre' => $servicio->nombre,
                'descripcion' => $servicio->descripcion,
                'costo' => $servicio->costo
            ]);
    }

    /**
     * @test
     */
    public function can_create_servicios()
    {
        $this->postJson(route('servicios.store'), [])->assertJsonValidationErrors(['nombre', 'descripcion', 'costo']);

        $this->postJson(route('servicios.store'), [
            'nombre' => 'Nuevo servicio',
            'descripcion' => 'Nueva descripcion de servicio',
            'costo' => '500.65',
        ])->assertJsonFragment([
            'nombre' => 'Nuevo servicio',
            'descripcion' => 'Nueva descripcion de servicio',
            'costo' => '500.65',
        ]);

        $this->assertDatabaseHas('servicios', [
            'nombre' => 'Nuevo servicio',
            'descripcion' => 'Nueva descripcion de servicio',
            'costo' => '500.65',
        ]);
    }

    /**
     * @test
     */
    public function can_update_servicios()
    {
        $servicio = Servicio::factory()->create();

        $this->patchJson(route('servicios.update', $servicio), [])->assertJsonValidationErrors(['nombre', 'descripcion', 'costo']);

        $this->patchJson(route('servicios.update', $servicio), [
            'nombre' => 'Servicio actualizado',
            'descripcion' => 'Descripcion de servicio actualizado',
            'costo' => '1000.65'
        ])->assertJsonFragment([
            'nombre' => 'Servicio actualizado',
            'descripcion' => 'Descripcion de servicio actualizado',
            'costo' => '1000.65'
        ]);

        $this->assertDatabaseHas('servicios', [
            'nombre' => 'Servicio actualizado',
            'descripcion' => 'Descripcion de servicio actualizado',
            'costo' => '1000.65'
        ]);
    }

    /**
     * @test
     */
    public function can_delete_servicios()
    {
        $servicio = Servicio::factory()->create();

        $this->deleteJson(route('servicios.destroy', $servicio))->assertNoContent();

        $this->assertDatabaseCount('servicios', 0);
    }
}
