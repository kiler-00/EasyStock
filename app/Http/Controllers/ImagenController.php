<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Imagen;
use App\Models\Producto;
use Illuminate\Support\Facades\Storage;

class ImagenController extends Controller
{
    public function store(Request $request, $productoId)
    {
        $request->validate([
            'imagen' => 'required|image|max:2048',
        ]);

        $path = $request->file('imagen')->store('imagenes', 'public');

        Imagen::create([
            'producto_id' => $productoId,
            'ruta' => $path,
        ]);

        return back()->with('success', 'Imagen subida correctamente.');
    }

    public function destroy($id)
    {
        $imagen = Imagen::findOrFail($id);

        if (Storage::disk('public')->exists($imagen->ruta)) {
            Storage::disk('public')->delete($imagen->ruta);
        }

        $imagen->delete();

        return back()->with('success', 'Imagen eliminada.');
    }
}
