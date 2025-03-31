@extends('layouts.app')

@section('content')
    <h1>Lista de Ventas</h1>
    <a href="{{ route('ventas.create') }}" class="btn btn-primary mb-3">Registrar Venta</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ventas as $venta)
                <tr>
                    <td>{{ $venta->cliente }}</td>
                    <td>${{ $venta->total }}</td>
                    <td>{{ $venta->fecha }}</td>
                    <td>
                        <form action="{{ route('ventas.destroy', $venta) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
