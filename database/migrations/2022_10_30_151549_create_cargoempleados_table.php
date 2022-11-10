<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargoempleados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_inicio');//inicio del contrato del cargo
            $table->date('fecha_fin'); //fin del cargo
            $table->string('sueldo'); // sueldo del cargo

            $table->unsignedBigInteger('persona_id')
            ->foreign('persona_id')->references('id')->on('personas')
            ->onDelete('cascade');

            $table->unsignedBigInteger('cargo_id')
            ->foreign('cargo_id')->references('id')->on('cargos')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cargoempleados');
    }
};
