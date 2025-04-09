@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="mb-4">Niveles de Existencia</h1>

        @if($productos->isEmpty())
            <div class="alert alert-info">No hay productos registrados.</div>
        @else
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Código</th>
                        <th>Stock</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->codigo }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>${{ number_format($producto->precio, 2) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
