@extends('layouts.app')

@section('title', 'Panel del Empleado')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="bg-white rounded-2xl shadow-lg p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800 text-center">
            👤 Bienvenido, {{ Auth::user()->name }}
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-center">
            <div class="bg-indigo-50 border-l-4 border-indigo-500 p-5 rounded-xl shadow-sm">
                <h2 class="text-lg font-semibold text-indigo-700">📦 Total de productos</h2>
                <p class="text-4xl font-extrabold text-indigo-900 mt-2">{{ $totalProductos }}</p>
            </div>

            <div class="bg-yellow-50 border-l-4 border-yellow-500 p-5 rounded-xl shadow-sm">
                <h2 class="text-lg font-semibold text-yellow-700">⚠️ Productos con baja existencia</h2>
                <p class="text-4xl font-extrabold text-yellow-900 mt-2">{{ $productosBajos }}</p>
            </div>

            <div class="bg-green-50 border-l-4 border-green-500 p-5 rounded-xl shadow-sm">
                <h2 class="text-lg font-semibold text-green-700">💰 Ventas de hoy</h2>
                <p class="text-4xl font-extrabold text-green-900 mt-2">$ {{ number_format($ventasHoy, 2) }}</p>
            </div>
        </div>

        <div class="mt-10 text-center">
            <a href="{{ route('existencias') }}"
                class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-full transition">
                📋 Ver Existencias
            </a>
        </div>
    </div>
</div>
@endsection
