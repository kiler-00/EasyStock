@extends('layouts.app')

@section('content')
<div class="container mt-5 bg-white p-4 rounded shadow-sm">
    <h3 class="mb-4 text-center">🔍 Reporte Personalizado</h3>

    <form method="GET" action="{{ route('reportes.personalizado') }}" class="row g-3 mb-4">
        <div class="col-md-4">
            <label for="usuario" class="form-label">Usuario</label>
            <select name="usuario" class="form-select">
                <option value="">Todos</option>
                @foreach($usuarios as $usuario)
                    <option value="{{ $usuario->id }}" {{ request('usuario') == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="categoria" class="form-label">Categoría</label>
            <select name="categoria" class="form-select">
                <option value="">Todas</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->id }}" {{ request('categoria') == $categoria->id ? 'selected' : '' }}>
                        {{ $categoria->nombre }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" class="form-select">
                <option value="">Todos</option>
                <option value="activo" {{ request('estado') == 'activo' ? 'selected' : '' }}>Activo</option>
                <option value="inactivo" {{ request('estado') == 'inactivo' ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
        <div class="col-md-6">
            <label for="fecha_inicio" class="form-label">Desde</label>
            <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
        </div>
        <div class="col-md-6">
            <label for="fecha_fin" class="form-label">Hasta</label>
            <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
        </div>
        <div class="col-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-success px-4">Generar Reporte</button>
        </div>
    </form>

    @if(isset($resultados) && count($resultados) > 0)
        <h5 class="text-center">📋 Resultados</h5>
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Categoría</th>
                        <th>Usuario</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resultados as $r)
                        <tr>
                            <td>{{ $r->producto }}</td>
                            <td>{{ $r->categoria }}</td>
                            <td>{{ $r->usuario }}</td>
                            <td>{{ ucfirst($r->estado) }}</td>
                            <td>{{ $r->fecha }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info text-center">No hay resultados con los filtros seleccionados.</div>
    @endif
</div>
@endsection
