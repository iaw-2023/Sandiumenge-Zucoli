<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class LogoController extends Controller
{
    public function index()
    {
        $logos = Logo::all();
        return view('logos.index')->with('logos', $logos);
    }

    public function show($id)
    {
        $logo = Logo::findOrFail($id);
        return view('logos.show')->with('logo', $logo);
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

    public function edit(string $id)
    {
        $logo = Logo::find($id);
        return view('logos.edit')->with('logo',$logo);
    }

    public function update(Request $request, $id)
    {   
        $logo = Logo::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|ends_with:.png|max:255',
        ]);
        
        $currentPath = public_path('uploads').'/'.$logo->name;
        $newPath = public_path('uploads').'/'.$request->name;

        if (file_exists($currentPath)) {
            rename($currentPath, $newPath);
        }
        $logo->name = $request->name;
    
        $logo->save();
    
        return back()->with('success', 'Nombre del logo actualizado correctamente.');
    }

    public function destroy($id)
    {
        $logo = Logo::findOrFail($id);
        $logo->delete();

        return back()->with('success', 'Logo eliminado correctamente.');
    }

}