@extends('layouts.app')

@section('title', 'Existencias de Productos')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="bg-white rounded-2xl shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">📦 Existencias de Productos</h1>

        <div class="overflow-x-auto rounded-xl border border-gray-200">
            <table class="min-w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-xs uppercase tracking-wider text-gray-600">
                    <tr>
                        <th class="py-3 px-4">#</th>
                        <th class="py-3 px-4">Nombre</th>
                        <th class="py-3 px-4">Código</th>
                        <th class="py-3 px-4">Stock</th>
                        <th class="py-3 px-4">Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $producto)
                        <tr class="border-t border-gray-200 hover:bg-gray-50 transition">
                            <td class="py-3 px-4">{{ $loop->iteration }}</td>
                            <td class="py-3 px-4">{{ $producto->nombre }}</td>
                            <td class="py-3 px-4">{{ $producto->codigo }}</td>
                            <td class="py-3 px-4">
                                <span class="@if($producto->stock < 5)
                                    text-red-600 font-semibold
                                @elseif($producto->stock >= 5 && $producto->stock < 10)
                                    text-yellow-600 font-semibold
                                @else
                                    text-green-700 font-semibold
                                @endif">
                                    {{ $producto->stock }}
                                </span>
                            </td>
                            <td class="py-3 px-4">{{ $producto->categoria }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="py-4 px-4 text-center text-gray-500 italic">No hay productos registrados.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6 text-center">
            <a href="{{ route('index') }}" class="inline-block bg-gray-700 hover:bg-gray-800 text-white font-semibold py-2 px-6 rounded-full transition">
                ← Volver al panel
            </a>
        </div>
    </div>
</div>
@endsection
