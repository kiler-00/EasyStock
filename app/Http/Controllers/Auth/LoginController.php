<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // Esta propiedad no se usará porque sobrescribimos authenticated()
    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    /**
     * Redirección según el rol después del login
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        } elseif ($user->hasRole('empleado')) {
            return redirect()->route('empleado.dashboard');
        }

        // Si no tiene un rol válido, cerrar sesión y mostrar error
        auth()->logout();
        return redirect('/login')->withErrors(['email' => 'Acceso no autorizado.']);
    }
}
