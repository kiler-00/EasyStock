@extends('layouts.app')

@section('title', 'Otros - Panel de Administración')

@section('content')
<div class="container mx-auto p-6">
    <div class="bg-white rounded-2xl shadow p-6">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 text-center">Opciones adicionales</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

            {{-- Exportar datos --}}
            <div class="bg-gray-100 rounded-xl p-5 shadow hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">📤 Exportar datos</h3>
                <p class="text-sm text-gray-600 mb-4">Descarga copias de seguridad en Excel o PDF.</p>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 w-full">
                    Exportar
                </button>
            </div>

            {{-- Manual de usuario --}}
            <div class="bg-gray-100 rounded-xl p-5 shadow hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">📘 Manual de usuario</h3>
                <p class="text-sm text-gray-600 mb-4">Consulta la guía de uso del sistema de inventario.</p>
                <a href="#" class="block text-center bg-blue-50 text-blue-600 px-4 py-2 rounded-lg hover:underline hover:bg-blue-100">
                    Ver manual
                </a>
            </div>

            {{-- Auditoría del sistema --}}
            <div class="bg-gray-100 rounded-xl p-5 shadow hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">🔍 Auditoría del sistema</h3>
                <p class="text-sm text-gray-600 mb-4">Historial de cambios y eventos importantes.</p>
                <button class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 w-full">
                    Ver registros
                </button>
            </div>

            {{-- Soporte técnico --}}
            <div class="bg-gray-100 rounded-xl p-5 shadow hover:shadow-md transition">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">🛠️ Soporte técnico</h3>
                <p class="text-sm text-gray-600 mb-4">Contacta con soporte si tienes algún problema.</p>
                <a href="#" class="block text-center text-blue-600 px-4 py-2 rounded-lg hover:underline hover:bg-blue-100">
                    Solicitar ayuda
                </a>
            </div>

        </div>
    </div>
</div>
@endsection
