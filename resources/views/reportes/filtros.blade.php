@extends('layouts.app')

@section('content')
<div class="container mt-5 bg-white p-4 rounded shadow-sm">
    <h3 class="mb-4 text-center">📊 Filtros de Reportes Personalizados</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('reportes.filtros') }}" method="GET" class="row g-3">
        <div class="col-md-3">
            <label for="fecha_inicio" class="form-label">Desde</label>
            <input type="date" name="fecha_inicio" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="fecha_fin" class="form-label">Hasta</label>
            <input type="date" name="fecha_fin" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" class="form-select">
                <option value="">Todas</option>
                <option value="1">Electrónica</option>
                <option value="2">Ropa</option>
                <option value="3">Hogar</option>
                {{-- Asegúrate de que estos IDs coincidan con los de tu base de datos --}}
            </select>
        </div>
        <div class="col-md-12 text-end">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
    </form>

    @if(isset($productos) && count($productos) > 0)
        <h4 class="mt-5">Resultados:</h4>
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Código</th>
                    <th>Stock</th>
                    <th>Precio</th>
                    <th>Categoría</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                    <tr>
                        <td>{{ $producto->nombre }}</td>
                        <td>{{ $producto->codigo }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>${{ $producto->precio }}</td>
                        <td>{{ $producto->categoria->nombre ?? 'Sin categoría' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @elseif(isset($productos))
        <div class="alert alert-info mt-4">No se encontraron productos que coincidan con los filtros seleccionados.</div>
    @endif
</div>
@endsection
