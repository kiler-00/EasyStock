@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="p-4 rounded shadow-lg w-100" style="background-color: rgba(255, 255, 255, 0.9); max-width: 1000px;">
        <h2>Crear Usuario</h2>

        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nombre</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Correo</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Contraseña</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Confirmar Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Rol</label>
                <select name="role" class="form-select" required>
                    <option value="empleado">Empleado</option>
                    <option value="admin">Administrador</option>
                </select>
            </div>

            <button class="btn btn-primary">Guardar</button>
        </form>
    </div>
</div>
@endsection
