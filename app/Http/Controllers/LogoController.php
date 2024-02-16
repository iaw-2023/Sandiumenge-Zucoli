<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::all();
        return view('logos.index', compact('logos'));
    }

    public function store(Request $request)
    {        
        /* $request->validate([
            'logo' => 'required|image|mimes:png|max:2048',
        ], [
            'logo.required' => 'Cargar una imagen valida',
        ]); TODO : NO FUNCIONA LA VALIDACION*/

        $logo = $request->file('name');
        //$logo->store('uploads', 'public');
        $name = time().'.'.$logo->getClientOriginalExtension();
        $ruta = public_path('uploads');
        $logo->move($ruta, $name);

        Logo::create([
            'name' => $name,
            'ruta' => $ruta.'/'.$name,
        ]);

        return back()->with('success', 'Logo subido correctamente.');
    }

    public function destroy($id)
    {
        $logo = Logo::findOrFail($id);
        $logo->delete();

        return back()->with('success', 'Logo eliminado correctamente.');
    }

}