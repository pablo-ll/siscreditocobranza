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

        $table->foreignId('prestamo_id')
              ->constrained('prestamos')
              ->cascadeOnDelete(); // 🔥 IMPORTANTE

        $table->decimal('monto_pagado', 10, 2);
        $table->date('fecha_pago');
        $table->enum('metodo_pago', ['Efectivo', 'Transferencia', 'Tarjeta', 'Cheque']);//añadir transferencia bancaria y pago QR
        $table->string('referencia_pago');
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
