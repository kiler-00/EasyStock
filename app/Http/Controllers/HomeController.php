<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }
    
        if (auth()->user()->hasRole('empleado')) {
            return redirect()->route('empleado.dashboard');
        }
    
        // Si no tiene ningún rol válido, lanza error
        abort(403, 'Acceso no autorizado');
    }
}
