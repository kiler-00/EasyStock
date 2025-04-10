@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="p-4 rounded shadow-lg w-100" style="background-color: rgba(255, 255, 255, 0.9); max-width: 1000px;">
        <h1 class="text-2xl font-semibold mb-4 text-gray-800">Agregar Producto</h1>
        
        <form action="{{ route('productos.store') }}" method="POST">
            @csrf
            <ul class="space-y-6">
                <li>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre del Producto</label>
                    <input type="text" id="nombre" name="nombre" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                </li>
                <li>
                    <label for="codigo" class="block text-sm font-medium text-gray-700">Código</label>
                    <input type="text" name="codigo" id="codigo" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                </li>
                <li>
                    <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                    <input type="number" name="stock" id="stock" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                </li>
                <li>
                    <label for="precio" class="block text-sm font-medium text-gray-700">Precio</label>
                    <input type="text" name="precio" id="precio" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                </li>
                <li>
                    <label for="categoria_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                    <select name="categoria_id" id="categoria_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md" required>
                        <option value="">Selecciona una categoría</option>
                        @foreach($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                        @endforeach
                    </select>
                </li>
                <li>
                    <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600">
                        Guardar
                    </button>
                </li>
            </ul>
        </form>
    </div>
</div>
@endsection
