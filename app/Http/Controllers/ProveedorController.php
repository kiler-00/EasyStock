<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    // Muestra la lista de proveedores
    public function index()
    {
        $proveedores = Proveedor::paginate(10);
        return view('proveedores.index', compact('proveedores'));
    }

    // Muestra el formulario para crear un nuevo proveedor
    public function create()
    {
        return view('proveedores.create');
    }

    // Guarda un nuevo proveedor en la base de datos
    public function store(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'contacto' => 'required|string|min:5|max:100'
        ]);

        // Crear el proveedor en la base de datos
        Proveedor::create([
            'nombre' => $request->nombre,
            'contacto' => $request->contacto,
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor agregado correctamente');
    }

    // Muestra el formulario de edición de un proveedor
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    // Actualiza la información del proveedor
    public function update(Request $request, Proveedor $proveedor)
    {
        // Validación de los datos
        $request->validate([
            'nombre' => 'required|string|min:3|max:100',
            'contacto' => 'required|string|min:5|max:100'
        ]);

        // Actualizar el proveedor
        $proveedor->update([
            'nombre' => $request->nombre,
            'contacto' => $request->contacto,
        ]);

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado correctamente');
    }

    // Elimina un proveedor de la base de datos
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado correctamente');
    }
}
