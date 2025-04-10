@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="p-4 rounded shadow-lg w-100" style="background-color: rgba(255, 255, 255, 0.9); max-width: 1000px;">
        <h2>Usuarios</h2>
        <a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">➕ Nuevo Usuario</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($usuarios as $usuario)
                    <tr>
                        <td>{{ $usuario->name }}</td>
                        <td>{{ $usuario->email }}</td>
                        <td>{{ $usuario->getRoleNames()->first() }}</td>
                        <td>
                            <a href="{{ route('usuarios.edit', $usuario) }}" class="btn btn-sm btn-warning">✏️ Editar</a>
                            
                            <form action="{{ route('usuarios.destroy', $usuario) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar este usuario?')">🗑️ Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
