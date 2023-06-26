<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo',
        'patente',
        'precio',
    ];

    public function marca()
    {
        return $this->belongsTo(Marca::class, 'id_marca');
    }
}
