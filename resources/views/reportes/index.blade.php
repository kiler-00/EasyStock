@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Panel de Reportes</h1>

    <div class="row">
        <!-- Productos más vendidos -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Más Vendidos</h5>
                    <p class="card-text">Consulta los productos con mayores ventas esta semana.</p>
                    <a href="{{ route('reportes.masvendidos') }}" class="btn btn-primary">Ver Reporte</a>
                </div>
            </div>
        </div>

        <!-- Comparativa de productos -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Comparativa de Productos</h5>
                    <p class="card-text">Compara las ventas entre productos de la misma categoría.</p>
                    <a href="{{ route('reportes.comparativa') }}" class="btn btn-info">Ver Comparativa</a>
                </div>
            </div>
        </div>

        <!-- Ingresos generados -->
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Ingresos Generados</h5>
                    <p class="card-text">Consulta el total de ingresos y el producto más vendido.</p>
                    <a href="{{ route('reportes.ingresos') }}" class="btn btn-success">Ver Ingresos</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <!-- Reportes personalizados -->
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Reportes Personalizados</h5>
                    <p class="card-text">Genera reportes con filtros avanzados.</p>
                    <a href="{{ route('reportes.personalizado') }}" class="btn btn-warning">Personalizar</a>
                </div>
            </div>
        </div>

        <!-- Filtros avanzados -->
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title">Filtros</h5>
                    <p class="card-text">Filtra productos por categoría, fecha y más.</p>
                    <a href="{{ route('reportes.filtros') }}" class="btn btn-secondary">Aplicar Filtros</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
