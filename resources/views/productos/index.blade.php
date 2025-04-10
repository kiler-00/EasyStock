@extends('layouts.app')

@section('content')
<div class="container d-flex justify-content-center mt-4">
    <div class="p-4 rounded shadow-lg w-100" style="background-color: rgba(255, 255, 255, 0.9); max-width: 1000px;">
        <h1 class="text-2xl font-semibold mb-4 text-gray-800">Lista de Productos</h1>
        
        <a href="{{ route('productos.create') }}" 
           class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition">
            Agregar Producto
        </a>

        <ul class="mt-4 space-y-4">
            @foreach($productos as $producto)
                <li class="flex justify-between items-center p-4 bg-gray-100 rounded-md shadow-sm">
                    <span class="text-lg text-gray-700">{{ $producto->nombre }} - 
                        <span class="text-gray-500">Stock: {{ $producto->stock }}</span>
                    </span>
                    
                    <div class="flex space-x-2">
                        <a href="{{ route('productos.edit', $producto) }}" 
                           class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition">
                            Editar
                        </a>
                        
                        <form action="{{ route('productos.destroy', $producto) }}" method="POST" 
                              onsubmit="return confirm('¿Seguro que quieres eliminar este producto?')">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection
