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
        Schema::create('notas', function (Blueprint $table) {
            $table->id();
            $table->string('tipo');
            $table->string('descripcion');
            $table->date('fecha');

            $table->unsignedBigInteger('persona_id')
                ->foreign('persona_id')->references('id')->on('personas')
                ->onDelete('cascade');

            $table->unsignedBigInteger('proveedor_id')
                ->foreign('proveedor_id')->references('id')->on('proveedores')
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
        Schema::dropIfExists('notas');
    }
};
