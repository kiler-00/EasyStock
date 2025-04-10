@extends('layouts.app')

@section('content')
<div class="container bg-white p-4 rounded shadow-lg" style="max-width: 800px;">
    <h2 class="mb-4 text-center">Panel de Administración</h2>

    <div class="row g-3 mb-5">
        <div class="col-md-6">
            <a href="{{ route('admin.seguimiento') }}"
               class="btn btn-outline-primary w-100"
               title="Revisar existencias de productos 📦">
                📦 Seguimiento de Existencias
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('reportes.index') }}"
               class="btn btn-outline-success w-100"
               title="Ver reportes de ventas 📈">
                📈 Reportes de Ventas
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('configuracion') }}"
               class="btn btn-outline-secondary w-100"
               title="Configura tu cuenta ⚙️">
                ⚙️ Configuración
            </a>
        </div>

        <div class="col-md-6">
            <a href="{{ route('notificaciones') }}"
               class="btn btn-outline-warning w-100"
               title="Notificaciones del sistema 🔔">
                🔔 Notificaciones
            </a>
        </div>
        <div class="col-md-6">
            <a href="{{ route('usuarios.index') }}"
                class="btn btn-outline-info w-100"
                title="Ver y gestionar empleados 👥">
                👥 Ver Empleados
            </a>
        </div>

        <div class="col-md-12">
            <a href="{{ route('admin.otros') }}"
               class="btn btn-outline-dark w-100"
               title="Contáctanos o deja tu feedback 💬">
                💬 Contacto de Desarrolladores
            </a>
        </div>
    </div>

</div>
@endsection
