<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function obtenerMensaje()
    {
        // Lógica para contar reservas por marca y construir el mensaje
        $conteoReservasPorMarca = DB::table('marcas')
            ->leftJoin('vehiculos', 'marcas.id', '=', 'vehiculos.id_marca')
            ->leftJoin('reserva_detalles', 'vehiculos.id', '=', 'reserva_detalles.id_vehiculo')
            ->select('marcas.marca', DB::raw('COUNT(reserva_detalles.id) as conteo_reservas'))
            ->groupBy('marcas.marca')
            ->get();

        $mensaje = 'Hola, ChatGPT. Sabiendo las siguientes preferencias de la gente decime que podes opinar del mercado. Se reservaron ';
        foreach ($conteoReservasPorMarca as $reservaPorMarca) {
            $mensaje .= $reservaPorMarca->conteo_reservas . ' ' . strtolower($reservaPorMarca->marca) . ' ';
            $mensaje .= ($reservaPorMarca->conteo_reservas == 1) ? 'y ' : 'y ';
        }

        $mensaje = rtrim($mensaje, ' y ') . '.'; // Eliminar el último "y" y agregar un punto al final
        return response($mensaje, 200)
            ->header('Content-Type', 'text/plain');
    }
}
