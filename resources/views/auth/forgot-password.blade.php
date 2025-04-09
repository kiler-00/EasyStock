@extends('layouts.app')

@section('title', 'Recuperar Contraseña')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-4">¿Olvidaste tu contraseña?</h2>
        <p class="text-sm text-gray-600 mb-6">
            No te preocupes. Solo ingresa tu correo electrónico y te enviaremos un enlace para restablecerla.
        </p>

        @if (session('status'))
            <div class="mb-4 text-green-600 font-medium text-sm">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
                @error('email')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
                Enviar enlace de recuperación
            </button>
        </form>

        <div class="text-center mt-4">
            <small class="text-gray-600">
                <a href="{{ route('login') }}" class="text-blue-600 hover:text-blue-800 font-medium">Volver al inicio de sesión</a>
            </small>
        </div>
    </div>
</div>
@endsection
