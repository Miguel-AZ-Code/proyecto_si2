<?php

namespace Tests\Feature;

use App\Models\Marca;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MarcasTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test marca.
     *
     * @test
     */
    public function can_get_all_marcas()
    {
        $marcas = Marca::factory(4)->create();

        $this->getJson(route('marcas.index'))
            ->assertJsonFragment([
                'nombre' => $marcas[0]->nombre
            ])->assertJsonFragment([
                'nombre' =>  $marcas[1]->nombre
            ]);
    }

    /**
     * @test
     */
    public function can_get_one_marca()
    {
        $marca = Marca::factory()->create();

        $this->getJson(route('marcas.show', $marca))
            ->assertJsonFragment([
                'nombre' => $marca->nombre
            ]);
    }

    /**
     * @test
     */
    public function can_create_marcas()
    {
        $this->postJson(route('marcas.store'), [])->assertJsonValidationErrorFor('nombre');

        $this->postJson(route('marcas.store'), [
            'nombre' => 'Mi nueva marca'
        ])->assertJsonFragment([
            'nombre' => 'Mi nueva marca'
        ]);

        $this->assertDatabaseHas('marcas', [
            'nombre' => 'Mi nueva marca'
        ]);
    }

    /**
     * @test
     */
    public function can_update_marcas()
    {
        $marca = Marca::factory()->create();

        $this->patchJson(route('marcas.update', $marca), [])->assertJsonValidationErrorFor('nombre');

        $this->patchJson(route('marcas.update', $marca), [
            'nombre' => 'Marca actualizada'
        ])->assertJsonFragment([
            'nombre' => 'Marca actualizada'
        ]);

        $this->assertDatabaseHas('marcas', [
            'nombre' => 'Marca actualizada'
        ]);
    }

    /**
     * @test
     */
    public function can_delete_marcas()
    {
        $marca = Marca::factory()->create();

        $this->deleteJson(route('marcas.destroy', $marca))->assertNoContent();

        $this->assertDatabaseCount('marcas', 0);
    }
}
