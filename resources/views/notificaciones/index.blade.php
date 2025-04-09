@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg">
        <h1 class="text-2xl font-semibold mb-4">Notificaciones</h1>

        @if($notificaciones->isEmpty())
            <p class="text-gray-600">No tienes notificaciones por el momento.</p>
        @else
            <ul class="space-y-4">
                @foreach ($notificaciones as $notificacion)
                    <li class="border border-gray-300 p-4 rounded-md bg-gray-50">
                        <p>{{ $notificacion->mensaje }}</p>
                        <small class="text-sm text-gray-500">📅 {{ $notificacion->created_at->format('d/m/Y H:i') }}</small>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
