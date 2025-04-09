<?php
namespace App\Http\Controllers;
use App\Models\Venta;
use App\Models\Producto;
use Illuminate\Http\Request;
class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::with('producto')->get(); // Carga la relación con el producto
        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('ventas.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
        'cliente' => 'required|min:3|max:100',
        'producto_id' => 'required|exists:productos,id',
        'cantidad' => 'required|integer|min:1',
        'total' => 'required|numeric|min:0',
        'fecha' => 'required|date',
        ]);


        Venta::create([
            'cliente' => $request->cliente,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'total' => $request->total,
            'fecha' => $request->fecha,
            'user_id' => auth()->id()
        ]);
        

        return redirect()->route('ventas.index')->with('success', 'Venta registrada correctamente');
    }

    public function edit(Venta $venta)
    {
        $productos = Producto::all();
        return view('ventas.edit', compact('venta', 'productos'));
    }

    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'cliente' => 'required|min:3|max:100',
            'producto_id' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'total' => 'required|numeric|min:0',
            'fecha' => 'required|date',
        ]);
        
        $venta->update([
            'cliente' => $request->cliente,
            'producto_id' => $request->producto_id,
            'cantidad' => $request->cantidad,
            'total' => $request->total,
            'fecha' => $request->fecha,
        ]);
        

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente');
    }

    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente');
    }
}
