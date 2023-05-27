<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reserva;
use App\Models\ReservaDetalles;

class ReservasControllerAPI extends Controller
{
    public function index()
    {
        $reservas = Reserva::all();
        return response()->json($reservas);
    }

    public function show(string $id)
    {
        $reserva = Reserva::find($id);
        if (!$reserva) {
            return response()->json(['error' => 'No existe la Reserva'], 404);
        }
        return response()->json($reserva);  
    }

    public function buscarPorMail(string $email_cliente)
    {
        $email = Reserva::where('email', $email_cliente)->get();
        if (!$email) {
            return response()->json(['error' => 'No existe el Email'], 404);
        }
        return response()->json($email); 
    }

    public function mostrarDetalles(string $id)
    {
        $id_vehiculo = ReservaDetalles::where('id_vehiculo', $id)->get();
        $id_reserva = ReservaDetalles::where('id_reserva', $id)->get();
        $precio = ReservaDetalles::where('precio', $id)->get();
        
        if (empty($id_vehiculo) || empty($id_reserva) || empty($precio)) {
            return response()->json(['error' => 'Datos vacios'], 404);
        }
        $data = [
            'id_vehiculo' => $id_vehiculo,
            'id_reserva' => $id_reserva,
            'precio' => $precio
        ];
        return response()->json($data);
    }
}

?>