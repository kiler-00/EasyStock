<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        return view('ventas.index', ['ventas' => Venta::all()]);
    }

    public function create()
    {
        return view('ventas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente' => 'required|min:3|max:100',
            'total' => 'required|numeric|min:0',
            'fecha' => 'required|date'
        ]);

        Venta::create($request->all());

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente');
    }

    public function edit(Venta $venta)
    {
        return view('ventas.edit', compact('venta'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'cliente' => 'required|min:3|max:100',
            'total' => 'required|numeric|min:0',
            'fecha' => 'required|date'
        ]);

        $venta->update($request->all());
        return redirect()->route('ventas.index')->with('success', 'Venta actualizada');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada');
    }
}
