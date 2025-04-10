@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="p-4 rounded shadow-lg w-100" style="background-color: rgba(255, 255, 255, 0.9); max-width: 1000px;">
        <h1 class="text-2xl font-semibold mb-4 text-gray-800">Editar Producto</h1>

        <form action="{{ route('productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700">Nombre</label>
                <input type="text" id="nombre" name="nombre" value="{{ $producto->nombre }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="mb-4">
                <label for="stock" class="block text-gray-700">Stock</label>
                <input type="number" id="stock" name="stock" value="{{ $producto->stock }}" class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
                    Actualizar Producto
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
