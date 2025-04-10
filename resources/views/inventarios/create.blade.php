@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="p-4 rounded shadow-lg w-100" style="background-color: rgba(255, 255, 255, 0.9); max-width: 1000px;">
        <h1>Registrar Movimiento de Inventario</h1>
        <form action="{{ route('inventarios.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Producto</label>
                <select name="producto_id" class="form-control" required>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Tipo de Movimiento</label>
                <select name="tipo_movimiento" class="form-control" required>
                    <option value="entrada">Entrada</option>
                    <option value="salida">Salida</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Cantidad</label>
                <input type="number" name="cantidad" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-success">Registrar</button>
        </form>
    </div>
</div>
@endsection
