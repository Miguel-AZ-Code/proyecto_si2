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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion')->nullable();
            $table->double('precio',9,2)->nullable();
            //agregar futuro stock
            $table->unsignedBigInteger('medida_id')
            ->foreign('medida_id')->references('id')->on('medidas')
            ->onDelete('cascade');
            $table->unsignedBigInteger('marca_id')
            ->foreign('marca_id')->references('id')->on('marcas')
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
        Schema::dropIfExists('materials');
    }
};
