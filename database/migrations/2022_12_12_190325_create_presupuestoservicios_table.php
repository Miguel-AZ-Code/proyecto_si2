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
        Schema::create('presupuestoservicios', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('presupuesto_id')
            ->foreign('presupuesto_id')->references('id')->on('presupuestos')
            ->onDelete('cascade');
            $table->unsignedBigInteger('servicio_id')
            ->foreign('servicio_id')->references('id')->on('servicios')
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
        Schema::dropIfExists('presupuestoservicios');
    }
};
