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
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $logo = $request->file('logo');
        $name = time().'.'.$logo->getClientOriginalExtension();
        $ruta = public_path('uploads');
        $logo->move($ruta, $name);

        Logo::create([
            'name' => $name,
            'ruta' => $ruta.'/'.$name,
        ]);

        return back()->with('success', 'Logo subido correctamente.');
    }
}
