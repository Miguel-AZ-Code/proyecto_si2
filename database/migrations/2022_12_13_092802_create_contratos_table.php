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
            $table->foreignId('empleado_id')->nullable()->constrained();
            $table->foreignId('cliente_id')->nullable()->constrained();
            $table->foreignId('proyecto_id')->nullable()->constrained();
            $table->foreignId('presupuesto_id')->nullable()->constrained();
            $table->foreignId('factura_id')->nullable()->constrained();
            $table->string('descripcion');
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
