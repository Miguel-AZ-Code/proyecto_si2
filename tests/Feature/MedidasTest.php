<?php

namespace Tests\Feature;

use App\Models\Medida;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MedidasTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test marca.
     *
     * @test
     */
    public function can_get_all_medidas()
    {
        $medidas = Medida::factory(4)->create();

        $this->getJson(route('medidas.index'))
            ->assertJsonFragment([
                'unidad' => $medidas[0]->unidad
            ])->assertJsonFragment([
                'unidad' =>  $medidas[1]->unidad
            ]);
    }

    /**
     * @test
     */
    public function can_get_one_medida()
    {
        $medida = Medida::factory()->create();

        $this->getJson(route('medidas.show', $medida))
            ->assertJsonFragment([
                'unidad' => $medida->unidad
            ]);
    }

    /**
     * @test
     */
    public function can_create_medidas()
    {
        $this->postJson(route('medidas.store'), [])->assertJsonValidationErrorFor('unidad');

        $this->postJson(route('medidas.store'), [
            'unidad' => 'Nueva medida'
        ])->assertJsonFragment([
            'unidad' => 'Nueva medida'
        ]);

        $this->assertDatabaseHas('medidas', [
            'unidad' => 'Nueva medida'
        ]);
    }

    /**
     * @test
     */
    public function can_update_medidas()
    {
        $medida = Medida::factory()->create();

        $this->patchJson(route('medidas.update', $medida), [])->assertJsonValidationErrorFor('unidad');

        $this->patchJson(route('medidas.update', $medida), [
            'unidad' => 'Unidad actualizada'
        ])->assertJsonFragment([
            'unidad' => 'Unidad actualizada'
        ]);

        $this->assertDatabaseHas('medidas', [
            'unidad' => 'Unidad actualizada'
        ]);
    }

    /**
     * @test
     */
    public function can_delete_medidas()
    {
        $medida = Medida::factory()->create();

        $this->deleteJson(route('medidas.destroy', $medida))->assertNoContent();

        $this->assertDatabaseCount('medidas', 0);
    }
}
