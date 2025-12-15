<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    public function prestamo()
{
    // Un Pago pertenece a un Prestamo (Many-to-One)
    return $this->belongsTo(Prestamo::class);
}
}
