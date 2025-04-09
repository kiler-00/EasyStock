<?php

// app/Http/Controllers/ConfiguracionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConfiguracionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('configuracion.index', compact('user'));
    }

    
    public function actualizar(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'local' => 'nullable|string|max:255',
            'idioma' => 'nullable|string|max:255',
            'ubicacion' => 'nullable|string|max:255',
        ]);

        $user = Auth::user();
        $user->update($request->only('name', 'local', 'idioma', 'ubicacion'));

        return redirect()->route('configuracion')->with('success', 'Configuración actualizada correctamente.');
    }
}
