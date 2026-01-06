<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles del Usuario') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                    <div class="max-w-md mx-auto">
                        <div class="bg-gray-50 p-6 rounded-lg shadow-inner">
                            <div class="mb-4">
                                <span class="block text-xs font-semibold text-gray-500 uppercase tracking-widest">ID</span>
                                <p class="text-lg font-medium text-gray-900">{{ $user->id }}</p>
                            </div>

                            <div class="mb-4">
                                <span class="block text-xs font-semibold text-gray-500 uppercase tracking-widest">Nombre</span>
                                <p class="text-lg font-medium text-gray-900">{{ $user->name }}</p>
                            </div>

                            <div class="mb-4">
                                <span class="block text-xs font-semibold text-gray-500 uppercase tracking-widest">Email</span>
                                <p class="text-lg font-medium text-gray-900">{{ $user->email }}</p>
                            </div>

                            <div class="mb-0">
                                <span class="block text-xs font-semibold text-gray-500 uppercase tracking-widest">Fecha de Registro</span>
                                <p class="text-lg font-medium text-gray-900">{{ $user->created_at->format('d/m/Y H:i') }}</p>
                            </div>
                        </div>

                        <div class="mt-8 flex items-center justify-between">
                            <a href="{{ route('users.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest hover:bg-gray-300 active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                Volver al Listado
                            </a>
                            <div class="space-x-2">
                                <a href="{{ route('users.edit', $user->id) }}" class="inline-flex items-center px-4 py-2 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-600 active:bg-amber-700 focus:outline-none focus:ring-2 focus:ring-amber-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    Editar
                                </a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-rose-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-rose-700 active:bg-rose-900 focus:outline-none focus:ring-2 focus:ring-rose-500 focus:ring-offset-2 transition ease-in-out duration-150" onclick="return confirm('¿Estás seguro?')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>