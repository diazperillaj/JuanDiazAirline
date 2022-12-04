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
        Schema::create('jdvuelos', function (Blueprint $table) {
            $table->id();
            $table->string('ciudad_partida');
            $table->string('ciudad_destino');
            $table->bigInteger('numero_pasajero');
            $table->string('novedad_vuelo')->nullable();
            $table->dateTime('fecha_partida');
            $table->dateTime('fecha_llegada');
            $table->unsignedBigInteger('jdaerolinea_id')->nullable();
            $table->foreign('jdaerolinea_id')
                ->references('id')
                ->on('jdaerolineas')
                ->cascadeOnUpdate()
                ->nullOnDelete();
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
        Schema::dropIfExists('jdvuelos');
    }
};
