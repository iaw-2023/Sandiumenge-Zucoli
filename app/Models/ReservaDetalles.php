<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservaDetalles extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_reserva',
        'id_vehiculo',
        'precio',
    ];

    public function reserva()
    {
        return $this->belongsTo(Reserva::class, 'id_reserva');
    }
}
