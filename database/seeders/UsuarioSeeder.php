<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        // Crear roles si no existen
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $empleadoRole = Role::firstOrCreate(['name' => 'empleado']);

        // Crear usuario ADMIN
        $admin = User::firstOrCreate(
            ['email' => 'admin@sistema.com'],
            [
                'name' => 'Administrador',
                'password' => Hash::make('admin123'), // Cambiá esto después
                'local' => 'Sucursal Central',
                'idioma' => 'es',
                'ubicacion' => 'Oficina principal',
            ]
        );
        $admin->assignRole($adminRole);

        // Crear usuario EMPLEADO
        $empleado = User::firstOrCreate(
            ['email' => 'empleado@sistema.com'],
            [
                'name' => 'Empleado General',
                'password' => Hash::make('empleado123'),
                'local' => 'Sucursal Norte',
                'idioma' => 'es',
                'ubicacion' => 'Área de ventas',
            ]
        );
        $empleado->assignRole($empleadoRole);
    }
}
