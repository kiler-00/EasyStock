@extends('layouts.app')

@section('content')
<div class="container mt-5 bg-white p-4 rounded shadow-sm">
    <h3 class="mb-4 text-center"> Productos más vendidos</h3>

    <form method="GET" action="{{ route('reportes.masvendidos') }}" class="row g-3 mb-4">
        <div class="col-md-6">
            <label for="fecha_inicio" class="form-label">Desde</label>
            <input type="date" name="fecha_inicio" class="form-control" value="{{ request('fecha_inicio') }}">
        </div>
        <div class="col-md-6">
            <label for="fecha_fin" class="form-label">Hasta</label>
            <input type="date" name="fecha_fin" class="form-control" value="{{ request('fecha_fin') }}">
        </div>
        <div class="col-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary px-4">Filtrar</button>
        </div>
    </form>

    @if(isset($productos) && count($productos) > 0)
        <h5 class="text-center">Productos Vendidos</h5>
        <canvas id="masVendidosChart" height="100"></canvas>
    @else
        <div class="alert alert-info text-center">No se encontraron productos vendidos en el rango seleccionado.</div>
    @endif
</div>

@if(isset($productos) && count($productos) > 0)
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('masVendidosChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode(array_keys($productos)) !!},
            datasets: [{
                label: 'Cantidad Vendida',
                data: {!! json_encode(array_values($productos)) !!},
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
                borderColor: '#dc3545',
                borderWidth: 1
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            },
            scales: {
                x: {
                    beginAtZero: true
                }
            }
        }
    });
</script>
@endif
@endsection
