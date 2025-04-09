@extends('layouts.app')

@section('content')
<div class="container mt-5 bg-white p-4 rounded shadow-sm">
    <h3 class="mb-4 text-center">💰 Ingresos Generados</h3>

    {{-- Validación de contenido --}}
    @if(count($ingresos) > 0)
        <h5 class="text-center">📊 Gráfico de Ingresos por Fecha</h5>
        <canvas id="ingresosChart" height="100"></canvas>

        @if($producto)
            <div class="alert alert-success mt-4 text-center">
                🏆 Producto más vendido: <strong>{{ $producto->nombre }}</strong>
            </div>
        @endif
    @else
        <div class="alert alert-info text-center">No hay ingresos registrados para mostrar.</div>
    @endif
</div>

{{-- Solo cargamos Chart.js si hay ingresos --}}
@if(count($ingresos) > 0)
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('ingresosChart').getContext('2d');
        new Chart(ctx, {
            type: 'line',
            data: {
                labels: {!! json_encode(array_keys($ingresos)) !!},
                datasets: [{
                    label: 'Ingresos ($)',
                    data: {!! json_encode(array_values($ingresos)) !!},
                    backgroundColor: 'rgba(40, 167, 69, 0.2)',
                    borderColor: '#28a745',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'bottom',
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endif
@endsection
