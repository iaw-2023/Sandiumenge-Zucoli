<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marcas = Marca::all(); //trae todos los registros de la tabla
        return view('marcas.index')->with('marcas',$marcas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $marcas = new Marca(); //crea un nuevo objecto de tipo vehiculo 

        $marcas->id = $request->get('id');
        $marcas->marca = $request->get('marca');

        $marcas->save();

        return redirect('/marcas');
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
        $marca = Marca::find($id);
        return view('marcas.edit')->with('marca',$marca);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $marca = Marca::find($id);

        $marca->id = $request->get('id');
        $marca->marca = $request->get('marca');

        $marca->save();

        return redirect('/marcas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $marca = Marca::find($id);

        $marca->delete();

        return redirect('/marcas');
    }
}
