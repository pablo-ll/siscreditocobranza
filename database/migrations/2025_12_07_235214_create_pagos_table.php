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
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('prestamo_id')->constrained('prestamos')->cascadeOnDelete();
            $table->decimal('monto_pagado', 10, 2);
            $table->date('fecha_pago');

            // CAMBIA EL ENUM POR STRING AQUÍ:
            $table->string('metodo_pago')->nullable();

            $table->string('referencia_pago')->nullable(); // Sugerencia: nullable si no siempre hay referencia
            $table->enum('estado', ['Pendiente', 'Confirmado', 'Fallido', 'En mora']);
            $table->date('fecha_cancelado')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pagos'); // 🔥 SIEMPRE PRIMERO
    }
};
