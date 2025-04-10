<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
    public function index()
    {
        $usuarios = User::all();
        return view('admin.index', compact('usuarios'));
    }

    public function otros()
    {
        return view('admin.otros');
    }
}
