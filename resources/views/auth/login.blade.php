@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-6">Iniciar Sesión</h2>

        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-sm" style="color: #dc2626;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Usuario</label>
                <input id="email" type="text" name="email" value="{{ old('email') }}" required autofocus
                    style="margin-top: 0.25rem; display: block; width: 100%; border-radius: 0.75rem; border: 1px solid #d1d5db; padding: 0.5rem; font-size: 0.875rem;">
            </div>

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input id="password" type="password" name="password" required
                    style="margin-top: 0.25rem; display: block; width: 100%; border-radius: 0.75rem; border: 1px solid #d1d5db; padding: 0.5rem; font-size: 0.875rem;">
            </div>

            <div class="flex items-center justify-between mb-6">
                <div></div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" style="font-size: 0.875rem; color: #2563eb;">
                        ¿Olvidó su contraseña?
                    </a>
                @endif
            </div>

            <button type="submit"
                style="width: 100%; background-color: #2563eb; color: white; font-weight: 600; padding: 0.5rem 1rem; border-radius: 0.75rem; transition: background-color 0.2s;">
                Iniciar sesión
            </button>
        </form>

        <div class="text-center mt-4">
            <small style="color: #4b5563;">¿No tiene una cuenta? 
                <a href="{{ route('register') }}" style="color: #2563eb; font-weight: 500;">Registrarse</a>
            </small>
        </div>
    </div>
</div>
@endsection
