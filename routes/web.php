<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\NotificacionController;
use App\Http\Controllers\ConfiguracionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Models\Producto;
use App\Models\Venta;

// Ruta raíz: Redirecciona según el rol del usuario
Route::get('/', function () {
    if (Auth::check()) {
        if (Auth::user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif (Auth::user()->hasRole('empleado')) {
            return redirect()->route('empleado.dashboard');
        }
    }
    return redirect()->route('login');
});

Auth::routes();

// Rutas comunes para usuarios autenticados
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion');
    Route::post('/configuracion/actualizar', [ConfiguracionController::class, 'actualizar'])->name('configuracion.actualizar');

    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones');

    Route::resource('productos', ProductoController::class);
    Route::resource('inventarios', InventarioController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('ventas', VentaController::class);
});

// Rutas exclusivas para administradores
Route::middleware(['auth', 'role:admin'])->group(function () {

    // ✅ CORREGIDA: carga datos correctamente desde el AdminController
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/otros', [AdminController::class, 'otros'])->name('admin.otros');

    Route::resource('usuarios', UserController::class);
    Route::get('/seguimiento', [ProductoController::class, 'niveles'])->name('admin.seguimiento');

    Route::resource('categorias', CategoriaController::class);
    Route::resource('imagenes', ImagenController::class);

    Route::prefix('reportes')->group(function () {
        Route::get('/', [ReporteController::class, 'index'])->name('reportes.index');
        Route::get('/mas-vendidos', [ReporteController::class, 'masVendidos'])->name('reportes.masvendidos');
        Route::get('/comparativa', [ReporteController::class, 'comparativa'])->name('reportes.comparativa');
        Route::get('/ingresos', [ReporteController::class, 'ingresos'])->name('reportes.ingresos');
        Route::get('/filtros', [ReporteController::class, 'filtros'])->name('reportes.filtros');
        Route::get('/personalizado', [ReporteController::class, 'personalizado'])->name('reportes.personalizado');
    });
});

// Rutas exclusivas para empleados
Route::middleware(['auth', 'role:empleado'])->group(function () {

    Route::get('/empleado', function () {
        $totalProductos = Producto::count();
        $productosBajos = Producto::where('stock', '<', 5)->count();
        $ventasHoy = Venta::whereDate('created_at', now()->toDateString())->sum('total');

        return view('empleado.index', compact('totalProductos', 'productosBajos', 'ventasHoy'));
    })->name('empleado.dashboard');

    Route::get('/existencias', [ProductoController::class, 'niveles'])->name('existencias');

    Route::get('/productos/{id}/detalles', [ProductoController::class, 'editarDetalles'])->name('productos.detalles');
});
