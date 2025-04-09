@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow p-4 rounded-4 bg-white bg-opacity-90">
        <h2 class="mb-4 text-center text-2xl font-semibold">Agregar Proveedor</h2>

        <form action="{{ route('proveedores.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" id="nombre" name="nombre" 
                       class="form-control @error('nombre') is-invalid @enderror" 
                       value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contacto" class="form-label">Contacto</label>
                <input type="text" id="contacto" name="contacto" 
                       class="form-control @error('contacto') is-invalid @enderror" 
                       value="{{ old('contacto') }}" required>
                @error('contacto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary w-100">Guardar</button>
        </form>
    </div>
</div>
@endsection
