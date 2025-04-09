<?php

use Illuminate\Support\Facades\Route;
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
use App\Models\Producto;
use App\Models\Venta;


// Redirección al login como entrada principal
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
// Rutas de autenticación (login, registro, verificación, etc.)
Auth::routes();

// 🔐 RUTAS PARA USUARIOS AUTENTICADOS
Route::middleware(['auth'])->group(function () {

    // Redirección según el rol después del login
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Configuración de usuario
    Route::get('/configuracion', [ConfiguracionController::class, 'index'])->name('configuracion');
    Route::post('/configuracion/actualizar', [ConfiguracionController::class, 'actualizar'])->name('configuracion.actualizar');

    // Notificaciones
    Route::get('/notificaciones', [NotificacionController::class, 'index'])->name('notificaciones');

    // CRUD básicos accesibles para ambos roles
    Route::resource('productos', ProductoController::class);
    Route::resource('inventarios', InventarioController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('ventas', VentaController::class);
});

// 🧑‍💼 RUTAS EXCLUSIVAS DEL ADMINISTRADOR
Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin', fn() => view('admin.index'))->name('admin.dashboard');

    // Vista de niveles de existencia (seguimiento)
    Route::get('/seguimiento', [ProductoController::class, 'niveles'])->name('admin.seguimiento');

    // Controladores adicionales del admin
    Route::resource('categorias', CategoriaController::class);
    Route::resource('imagenes', ImagenController::class);

    // Reportes
    Route::prefix('reportes')->group(function () {
        Route::get('/', [ReporteController::class, 'index'])->name('reportes.index');
        Route::get('/mas-vendidos', [ReporteController::class, 'masVendidos'])->name('reportes.masvendidos');
        Route::get('/comparativa', [ReporteController::class, 'comparativa'])->name('reportes.comparativa');
        Route::get('/ingresos', [ReporteController::class, 'ingresos'])->name('reportes.ingresos');
        Route::get('/filtros', [ReporteController::class, 'filtros'])->name('reportes.filtros');
        Route::get('/personalizado', [ReporteController::class, 'personalizado'])->name('reportes.personalizado');
    });

    // Vista "otros" con correos de desarrolladores
    Route::get('/otros', fn() => view('admin.otros'))->name('admin.otros');
});

// 👨‍🔧 RUTAS EXCLUSIVAS DEL EMPLEADO
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
