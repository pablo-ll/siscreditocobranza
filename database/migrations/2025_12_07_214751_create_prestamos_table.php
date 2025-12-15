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
    Schema::create('prestamos', function (Blueprint $table) {
        $table->id();

        $table->foreignId('cliente_id')
              ->constrained('clientes')
              ->cascadeOnDelete();

        $table->decimal('monto_prestado', 10, 2);
        $table->decimal('tasa_interes', 5, 2);
        $table->enum('modalidad', ['Diario', 'Semanal', 'Quincenal', 'Mensual', 'Anual']);
        $table->integer('nro_cuotas');
        $table->decimal('monto_total', 12, 2);
        $table->date('fecha_inicio');
        $table->enum('estado', ['Pendiente', 'Pagado', 'Cancelado'])->default('Pendiente');

        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('prestamos');
}

};