<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Notificacion;

class NotificacionController extends Controller
{
    public function index()
    {
        $notificaciones = Notificacion::where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();

        return view('notificaciones.index', compact('notificaciones'));
    }

    public function marcarComoLeida($id)
    {
        $notificacion = Notificacion::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $notificacion->leida = true;
        $notificacion->save();

        return redirect()->route('notificaciones')->with('success', 'Notificación marcada como leída.');
    }
}
