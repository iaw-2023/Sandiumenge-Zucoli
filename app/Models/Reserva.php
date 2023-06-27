<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Vehiculo;


class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'email_cliente'
    ];

    public function vehiculo()
    {
        return $this->belongsTo(Vehiculo::class);
    }
}
