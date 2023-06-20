<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reserva;

class ReservasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservas = Reserva::all();
        return view('reservas.index')->with('reservas',$reservas);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('reservas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|min:3|max:255',
        ], [
            'email.required' => 'El campo email es obligatorio',
        ]);
        $reservas = new Reserva();

        do {
            $randomId = mt_rand(100000, 999999); 
        } while (Marca::where('id', $randomId)->exists());
        $reservas->id = $randomId;

        $reservas->email = $request->get('email');

        $reservas->save();

        return redirect('/reservas');
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
        $reserva = Reserva::find($id);
        return view('reservas.edit')->with('reserva',$reserva);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $reserva = Reserva::find($id);

        $reserva->id = $request->get('id');
        $reserva->email = $request->get('email');

        $reserva->save();

        return redirect('/reservas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $reserva = Reserva::find($id);

        $reserva->delete();

        return redirect('/reservas');
    }
}
