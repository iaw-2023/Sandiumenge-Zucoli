<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculosControllerAPI extends Controller
{
    public function index()
    {
        $vehiculos = Vehiculo::all();
        return response()->json($vehiculos);
    }

    public function show(string $id)
    {
        $vehiculo = Vehiculo::find($id);
        if (!$vehiculo) {
            return response()->json(['error' => 'No existe el Vehiculo'], 404);
        }
        return response()->json($vehiculo);  
    }

    public function buscarVehiculoPorMarca(int $idMarca)
    {
        $vehiculo = Turno::where('id_marca', $idMarca)->get();
        if(!$vehiculo){
            return response()->json(['error' => 'No existe la Marca'], 404);
        }
        return response()->json($vehiculo);
    }

    public function buscarVehiculoPorModelo(string $modelo)
    {
        $modelo = Vehiculo::where('modelo', $modelo)->get();
        if (!$modelo) {
            return response()->json(['error' => 'No se encuentra el Vehiculo por Modelo'], 404);
        }
        return response()->json($modelo);
    }
}

?>