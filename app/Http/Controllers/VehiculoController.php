<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller{

    public function showAllVehiculos(){
        $vehiculos = Vehiculo::get();
        $columns = ['modelo','patente','precio'];

        return view('vehiculos/vehiculos')->with('vehiculos', $vehiculos)->with('columns', $columns);
    }


}