<x-guest-layout>
    <div class="max-w-md w-full mx-auto bg-white p-6 rounded-2xl shadow-md">
        <h2 class="text-xl font-bold text-center text-gray-800 mb-4">Verifica tu Correo</h2>

        <p class="text-sm text-gray-600 mb-4">
            ¡Gracias por registrarte! Antes de comenzar, por favor verifica tu dirección de correo electrónico haciendo clic en el enlace que te acabamos de enviar. 
            Si no recibiste el correo, con gusto te enviaremos otro.
        </p>

        @if (session('status') == 'verification-link-sent')
            <div class="bg-green-100 text-green-700 px-4 py-2 rounded-xl text-sm mb-4">
                Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste.
            </div>
        @endif

        <div class="mt-4 flex flex-col sm:flex-row items-center justify-between gap-3">
            <form method="POST" action="{{ route('verification.send') }}" class="w-full sm:w-auto">
                @csrf
                <button
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-xl transition duration-200">
                    Reenviar Correo de Verificación
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}" class="w-full sm:w-auto">
                @csrf
                <button
                    class="w-full text-sm text-gray-600 hover:text-red-600 underline transition duration-150">
                    Cerrar sesión
                </button>
            </form>
        </div>
    </div>
</x-guest-layout>
