<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

        public function cliente()
    {
        // Un Prestamo pertenece a un Cliente (Many-to-One)
        return $this->belongsTo(Cliente::class);
    }
    public function pagos()
    {
        // Un Prestamo tiene muchos Pagos (One-to-Many)
        return $this->hasMany(Pago::class);
    }
}
