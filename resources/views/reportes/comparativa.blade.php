@extends('layouts.app')

@section('content')
<div class="container mt-5 bg-white p-4 rounded shadow-sm">
    <h3 class="mb-4 text-center">📈 Comparativa de Productos</h3>

    <form method="GET" action="{{ route('reportes.comparativa') }}" class="row g-3 mb-4">
        <div class="col-md-5">
            <label for="producto1" class="form-label">Producto A</label>
            <select name="producto1" class="form-select">
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-5">
            <label for="producto2" class="form-label">Producto B</label>
            <select name="producto2" class="form-select">
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-success w-100">Comparar</button>
        </div>
    </form>

    @if(isset($datosComparativos))
        <h5 class="text-center">📊 Comparativa de Ventas</h5>
        <canvas id="comparativaChart" height="100"></canvas>
    @endif
</div>

@if(isset($datosComparativos))
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('comparativaChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($datosComparativos['labels']) !!},
            datasets: [
                {
                    label: '{{ $datosComparativos['producto1_nombre'] }}',
                    backgroundColor: '#007bff',
                    data: {!! json_encode($datosComparativos['producto1_ventas']) !!}
                },
                {
                    label: '{{ $datosComparativos['producto2_nombre'] }}',
                    backgroundColor: '#ffc107',
                    data: {!! json_encode($datosComparativos['producto2_ventas']) !!}
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'bottom',
                },
            }
        }
    });
</script>
@endif
@endsection
