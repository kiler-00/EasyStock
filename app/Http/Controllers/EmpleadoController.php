<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Venta;
use Illuminate\Support\Facades\Auth;

class EmpleadoController extends Controller
{
    // Vista principal del panel del empleado
    public function index()
    {
        $usuario = Auth::user();
        $totalVentas = Venta::where('user_id', $usuario->id)->count();
        $productosRegistrados = Producto::count();
        $ventasRecientes = Venta::where('user_id', $usuario->id)
            ->orderByDesc('created_at')
            ->take(5)
            ->get();

        return view('empleado.index', compact('usuario', 'totalVentas', 'productosRegistrados', 'ventasRecientes'));
    }

    // Mostrar existencias de productos
    public function existencias()
    {
        $productos = Producto::all();
        return view('empleado.existencias', compact('productos'));
    }
}
