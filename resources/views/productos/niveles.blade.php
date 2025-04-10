@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="p-4 rounded shadow-lg w-100" style="background-color: rgba(255, 255, 255, 0.9); max-width: 1000px;">
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
</div>
@endsection
