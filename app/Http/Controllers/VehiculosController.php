<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;

class VehiculosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vehiculos = Vehiculo::all(); //trae todos los registros de la tabla
        return view('vehiculos.index')->with('vehiculos',$vehiculos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vehiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $vehiculos = new Vehiculo(); //crea un nuevo objecto de tipo vehiculo 

        $vehiculos->id = $request->get('id');
        $vehiculos->id_marca = $request->get('id_marca');
        $vehiculos->modelo = $request->get('modelo');
        $vehiculos->precio = $request->get('precio');
        $vehiculos->disponible = $request->get('disponible');

        $vehiculos->save();

        return redirect('/vehiculos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $vehiculo = Vehiculo::find($id);
        return view('vehiculos.edit')->with('vehiculo',$vehiculo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $vehiculo = Vehiculo::find($id);

        $vehiculo->id = $request->get('id');
        $vehiculo->id_marca = $request->get('id_marca');
        $vehiculo->modelo = $request->get('modelo');
        $vehiculo->precio = $request->get('precio');
        $vehiculo->disponible = $request->get('disponible');

        $vehiculo->save();

        return redirect('/vehiculos');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $vehiculo = Vehiculo::find($id);

        $vehiculo->delete();

        return redirect('/vehiculos');
    }
}
