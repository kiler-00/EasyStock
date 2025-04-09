@extends('layouts.app')

@section('title', 'Seguimiento de Existencias')

@section('content')
<div class="container bg-white p-4 rounded shadow-lg" style="max-width: 900px;">
    <h2 class="mb-4 text-center text-2xl font-bold text-gray-800">📦 Seguimiento de Existencias</h2>

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle">
            <thead class="table-light text-center">
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Descripción</th>
                    <th>Stock</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @forelse($productos as $producto)
                    <tr>
                        <td class="text-center">
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" width="60" class="rounded shadow-sm">
                            @else
                                <span class="text-muted fst-italic">Sin imagen</span>
                            @endif
                        </td>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->descripcion }}</td>
                        <td class="text-center">{{ $producto->stock }}</td>
                        <td class="text-center">
                            @if ($producto->stock < 5)
                                <span class="badge bg-danger">❌ Bajo stock</span>
                            @else
                                <span class="badge bg-success">✅ Stock suficiente</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">No hay productos registrados aún.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
