@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold mb-4 text-gray-800">Lista de Proveedores</h1>
        
        <a href="{{ route('proveedores.create') }}" 
           class="inline-block bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600 transition mb-4">
            Agregar Proveedor
        </a>

        <div class="overflow-x-auto">
            <table class="w-full border border-gray-300 rounded-md shadow-sm">
                <thead class="bg-gray-200 text-gray-700">
                    <tr>
                        <th class="p-3 text-left">Nombre</th>
                        <th class="p-3 text-left">Contacto</th>
                        <th class="p-3 text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($proveedores as $proveedor)
                        <tr class="border-b border-gray-300">
                            <td class="p-3">{{ $proveedor->nombre }}</td>
                            <td class="p-3">{{ $proveedor->contacto }}</td>
                            <td class="p-3 text-center">
                                <a href="{{ route('proveedores.edit', $proveedor) }}" 
                                   class="bg-yellow-500 text-white px-3 py-1 rounded-md hover:bg-yellow-600 transition">
                                    Editar
                                </a>
                                
                                <form action="{{ route('proveedores.destroy', $proveedor) }}" method="POST" 
                                      class="inline-block" onsubmit="return confirm('¿Seguro que quieres eliminar este proveedor?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            class="bg-red-500 text-white px-3 py-1 rounded-md hover:bg-red-600 transition">
                                        Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection