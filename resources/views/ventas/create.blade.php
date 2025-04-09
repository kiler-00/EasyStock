@extends('layouts.app')

@section('content')
    <h1>Registrar Venta</h1>

    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <input type="text" name="cliente" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Producto</label>
            <select name="producto_id" class="form-control" required>
                <option value="">Seleccione un producto</option>
                @foreach($productos as $producto)
                    <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" name="cantidad" class="form-control" min="1" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Total</label>
            <input type="text" name="total" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Fecha</label>
            <input type="date" name="fecha" class="form-control" required>
        </div>


        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
@endsection
