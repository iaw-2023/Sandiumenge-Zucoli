<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaDetalles extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_vehiculo',
        'id_reserva',
        'precio',
    ];
}
