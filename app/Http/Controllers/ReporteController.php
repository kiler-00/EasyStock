<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Producto;
use Carbon\Carbon;
use DB;

class ReporteController extends Controller
{
    public function index()
    {
        return view('reportes.index');
    }

    public function masVendidos(Request $request)
    {
        $inicio = $request->input('fecha_inicio', Carbon::now()->startOfWeek());
        $fin = $request->input('fecha_fin', Carbon::now()->endOfWeek());

        $raw = Venta::select('producto_id', DB::raw('SUM(cantidad) as total_vendido'))
            ->whereBetween('created_at', [$inicio, $fin])
            ->groupBy('producto_id')
            ->orderByDesc('total_vendido')
            ->with('producto')
            ->take(5)
            ->get();

        $productos = $raw->mapWithKeys(function ($item) {
            return [$item->producto->nombre => $item->total_vendido];
        })->toArray();

        $mensaje = match (true) {
            array_sum($productos) > 100 => '¡Las ventas han incrementado satisfactoriamente!',
            array_sum($productos) > 50 => 'Se ha vendido 20% más que la semana pasada.',
            default => 'Ventas estables esta semana.'
        };

        return view('reportes.masvendidos', compact('productos', 'mensaje'));
    }


    public function comparativa(Request $request)
    {
    $productos = \App\Models\Producto::all();

    if ($request->has(['producto1_id', 'producto2_id'])) {
        $producto1 = \App\Models\Producto::find($request->input('producto1_id'));
        $producto2 = \App\Models\Producto::find($request->input('producto2_id'));

        if (!$producto1 || !$producto2) {
            return redirect()->route('reportes.comparativa')->with('error', 'Productos no válidos.');
        }

        $ventas1 = $producto1->ventas()
            ->selectRaw('DATE(created_at) as fecha, SUM(cantidad) as total')
            ->groupBy('fecha')->get();

        $ventas2 = $producto2->ventas()
            ->selectRaw('DATE(created_at) as fecha, SUM(cantidad) as total')
            ->groupBy('fecha')->get();

        return view('reportes.comparativa', compact('producto1', 'producto2', 'ventas1', 'ventas2', 'productos'));
    }

    return view('reportes.comparativa', compact('productos'));
    }


    public function ingresos()
    {
    $rawIngresos = Venta::select(
        DB::raw('DATE(created_at) as fecha'),
        DB::raw('SUM(total) as ingreso')
    )
    ->groupBy(DB::raw('DATE(created_at)'))
    ->orderBy('fecha')
    ->get();

    $ingresos = $rawIngresos->pluck('ingreso', 'fecha')->toArray();

    $top = Venta::select('producto_id', DB::raw('SUM(total) as total'))
        ->groupBy('producto_id')
        ->orderByDesc('total')
        ->first();

    $producto = $top ? Producto::find($top->producto_id) : null;

    return view('reportes.ingresos', compact('ingresos', 'producto'));
    }



    public function filtros(Request $request)
    {
        $query = Producto::query();

        if ($request->filled('categoria')) {
            $query->where('categoria_id', $request->input('categoria'));
        }

        if ($request->filled('usuario')) {
            $query->where('usuario_id', $request->input('usuario'));
        }

        if ($request->filled('fecha_inicio') && $request->filled('fecha_fin')) {
            $query->whereBetween('created_at', [$request->fecha_inicio, $request->fecha_fin]);
        }

        $productos = $query->get();

        return view('reportes.filtros', compact('productos'));
    }

        public function personalizado(Request $request)
    {
        $productos = \App\Models\Producto::where('stock', '<', 5)->get();
        $usuarios = \App\Models\User::all(); // si usas usuarios
        $categorias = \App\Models\Categoria::all(); // 👈 esta línea arregla el error

        return view('reportes.personalizado', compact('productos', 'usuarios', 'categorias'));
    }


}
