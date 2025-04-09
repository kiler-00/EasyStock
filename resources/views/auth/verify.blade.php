@extends('layouts.app')

@section('title', 'Verificar Correo Electrónico')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full bg-white p-8 rounded-2xl shadow-lg">
        <h2 class="text-center text-2xl font-bold text-gray-800 mb-4">Verificación de Correo</h2>

        @if (session('resent'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-4 text-sm">
                Se ha enviado un nuevo enlace de verificación a tu correo electrónico.
            </div>
        @endif

        <p class="text-gray-700 text-sm mb-4">
            Antes de continuar, por favor revisa tu correo electrónico y haz clic en el enlace de verificación.
        </p>
        <p class="text-gray-700 text-sm mb-4">
            Si no recibiste el correo, puedes solicitar otro a continuación.
        </p>

        <form method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <button type="submit"
                class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-xl transition duration-200">
                Enviar nuevo enlace de verificación
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
