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
        Schema::create('contratos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion');

            $table->foreignId('cliente_id')
                ->nullable()
                ->constrained('users')
                ->cascadeOnUpdate()
                ->nullOnDelete();
           /*  $table->unsignedBigInteger('documento_id')
            ->foreign('documento_id')->references('id')->on('documentos')
            ->onDelete('cascade'); */
            $table->unsignedBigInteger('presupuesto_id')
            ->foreign('presupuesto_id')->references('id')->on('presupuestos')
            ->onDelete('cascade');
            $table->unsignedBigInteger('factura_id')
            ->foreign('factura_id')->references('id')->on('facturas')
            ->onDelete('cascade');
            $table->unsignedBigInteger('proyecto_id')
            ->foreign('proyecto_id')->references('id')->on('proyectos')
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
        Schema::dropIfExists('contratos');
    }
};
