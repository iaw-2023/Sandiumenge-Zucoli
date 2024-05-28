<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logo;
use App\Models\Marca;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
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
        $name = time().'.'.$logo->getClientOriginalExtension();
        $logo->storeAs('uploads', $name, 'public');
        
        Logo::create([
            'name' => $name,
            'ruta' => asset('storage/uploads/'.$name)
        ]);

        return back()->with('success', 'Logo subido correctamente.');
    }

    public function edit(string $id)
    {
        $logo = Logo::find($id);
        return view('logos.edit')->with('logo',$logo);
    }

    public function obtenerPrimerJPGEnDirectorio()
    {
        $directorio = asset('storage/uploads');
        if (!Storage::exists($directorio)) {
            return "El directorio especificado no existe.";
        }

        $archivos = Storage::files($directorio);

        foreach ($archivos as $archivo) {
            $extension = pathinfo($archivo, PATHINFO_EXTENSION);
            if (strtolower($extension) === 'jpg') {
                return $archivo;
            }
        }
        return "No se encontraron archivos .jpg en el directorio especificado.";
    }

    private function removerExtensionPNG($cadena)
        {
            if (str_ends_with($cadena, '.png')) {
                return substr($cadena, 0, -4); // Quitar los últimos 4 caracteres (".png")
            } else {
                return $cadena; // Devolver la cadena original si no termina con ".png"
            }
        }

    public function verificarCadena($cadena)
    {
        $marcaEncontrada = Marca::where('marca', $this->removerExtensionPNG($cadena))->exists();
        $cadenaNoEncontradaEnLogos = !Logo::where('name', $cadena)->exists();

        return $marcaEncontrada && $cadenaNoEncontradaEnLogos;
    }

    public function update(Request $request, $id)
    {   
        $logo = Logo::findOrFail($id);
    
        $request->validate([
            'name' => 'required|string|ends_with:.png|max:255',
        ]);
        
        $esNombreValido = $this->verificarCadena($request->name);
        $mensaje='';
        if ($esNombreValido) {

            Storage::disk('public')->move('uploads/'.$logo->name, 'uploads/'.$request->name); //public
            
            $logo->name = $request->name;
            $logo->ruta = asset('storage/uploads/'.$request->name);
            $logo->save();
        
            $mensaje='Nombre del logo actualizado correctamente.';
        } else {
            $mensaje='Ese nombre de logo ya existe o no se pudo asociar a una marca existente';
        }
        return back()->with('success', $mensaje);
    }

    public function destroy($id)
    {
        $logo = Logo::findOrFail($id);
        Storage::disk('public')->delete('uploads/'.$logo->name);
        $logo->delete();
        return back()->with('success', 'Logo eliminado correctamente.');
    }

}