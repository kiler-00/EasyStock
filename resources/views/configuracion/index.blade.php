@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg rounded-4 p-4" style="max-width: 600px; margin: auto; background-color: rgba(255, 255, 255, 0.95);">
        <h2 class="mb-4 text-center fw-bold">Configuración de Usuario</h2>

        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('configuracion.actualizar') }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $user->name) }}" required autofocus>
                @error('name')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="local" class="form-label">Local</label>
                <input id="local" type="text" class="form-control" name="local" value="{{ old('local', $user->local) }}">
                @error('local')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="idioma" class="form-label">Idioma</label>
                <input id="idioma" type="text" class="form-control" name="idioma" value="{{ old('idioma', $user->idioma) }}">
                @error('idioma')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input id="ubicacion" type="text" class="form-control" name="ubicacion" value="{{ old('ubicacion', $user->ubicacion) }}">
                @error('ubicacion')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary rounded-pill px-5">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
