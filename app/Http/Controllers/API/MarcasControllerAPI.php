<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Marca;

class MarcasControllerAPI extends Controller
{
    public function index()
    {
        $marcas = Marca::all();
        return response()->json($marcas);
    }

    public function show(string $id)
    {
        $marca = Marca::find($id);
        if (!$marca) {
            return response()->json(['error' => 'No existe la Marca'], 404);
        }
        return response()->json($marca);  
    }

    public function buscarMarca(string $marca)
    {
        $marcas = Marca::where('marca', $marca)->get();
        if (!$marcas) {
            return response()->json(['error' => 'No se encuentra la Marca'], 404);
        }
        return response()->json($marcas);
    }
}

?>