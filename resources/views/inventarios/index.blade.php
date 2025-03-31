@extends('layouts.app')

@section('content')
    <h1>Inventario</h1>
    <a href="{{ route('inventarios.create') }}" class="btn btn-primary mb-3">Registrar Movimiento</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Tipo</th>
                <th>Cantidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($inventarios as $inventario)
                <tr>
                    <td>{{ $inventario->producto->nombre }}</td>
                    <td>{{ ucfirst($inventario->tipo_movimiento) }}</td>
                    <td>{{ $inventario->cantidad }}</td>
                    <td>
                        <form action="{{ route('inventarios.destroy', $inventario) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
