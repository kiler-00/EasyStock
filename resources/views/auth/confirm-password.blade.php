<x-guest-layout>
    <div class="max-w-md w-full mx-auto bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-xl font-bold text-center text-gray-800 mb-4">Confirmar Contraseña</h2>

        <p class="text-sm text-gray-600 mb-4 text-center">
            Esta es una zona segura de la aplicación. Por favor confirma tu contraseña antes de continuar.
        </p>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input id="password" type="password"
                       class="form-input mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500"
                       name="password" required autocomplete="current-password">
                @error('password')
                    <span class="text-sm text-red-600 mt-1">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex justify-end">
                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-xl transition duration-200">
                    Confirmar
                </button>
            </div>
        </form>
    </div>
</x-guest-layout>
