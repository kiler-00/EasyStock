@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="p-4 rounded shadow-lg w-100" style="background-color: rgba(255, 255, 255, 0.9); max-width: 1000px;">
        <h2>Editar Usuario</h2>

        <form action="{{ route('usuarios.update', $usuario) }}" method="POST">
            @csrf @method('PUT')

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" value="{{ $usuario->name }}" required>
            </div>

            <div class="mb-3">
                <label>Correo</label>
                <input type="email" name="email" class="form-control" value="{{ $usuario->email }}" required>
            </div>

            <div class="mb-3">
                <label>Rol</label>
                <select name="role" class="form-select" required>
                    <option value="empleado" @if($usuario->hasRole('empleado')) selected @endif>Empleado</option>
                    <option value="admin" @if($usuario->hasRole('admin')) selected @endif>Administrador</option>
                </select>

            </div>

            <button class="btn btn-success">Actualizar</button>
        </form>
    </div>
</div>
@endsection
