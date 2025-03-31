<?php
namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        return view('inventarios.index', ['inventarios' => Inventario::all()]);
    }

    public function create()
    {
        return view('inventarios.create', ['productos' => Producto::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'tipo_movimiento' => 'required|in:entrada,salida',
            'cantidad' => 'required|integer|min:1'
        ]);

        Inventario::create($request->all());

        return redirect()->route('inventarios.index')->with('success', 'Movimiento de inventario registrado');
    }

    public function edit(Inventario $inventario)
    {
        return view('inventarios.edit', compact('inventario'));
    }

    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'tipo_movimiento' => 'required|in:entrada,salida',
            'cantidad' => 'required|integer|min:1'
        ]);

        $inventario->update($request->all());
        return redirect()->route('inventarios.index')->with('success', 'Movimiento actualizado');
    }

    public function destroy(Inventario $inventario)
    {
        $inventario->delete();
        return redirect()->route('inventarios.index')->with('success', 'Movimiento eliminado');
    }
}
