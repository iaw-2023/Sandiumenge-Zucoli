<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservas_detalle', function (Blueprint $table) {
            $table->id();
            $table->integer('precio');
            $table->integer('id_reserva');
            $table->foreign('id_reserva')
                    ->references('id')
                    ->on('reservas');
            $table->integer('id_vehiculo');
            $table->foreign('id_vehiculo')
                    ->references('id')
                    ->on('vehiculos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas_detalle');
    }
};
