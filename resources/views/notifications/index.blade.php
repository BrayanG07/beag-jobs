<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-bold text-center my-7">Mis notificaciones</h1>

                    <div class="divide-y divide-gray-200">
                        @forelse ($notifications as $notification)
                            <div class="p-5 md:flex md:justify-between md:items-center">
                                <div>
                                    <p>Tienes un nuevo candidato en:
                                        <span class="font-bold">{{ $notification->data['name_vacant'] }}</span>
                                    </p>
                                    <p>Hace:
                                        <span class="font-bold">{{ $notification->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>
                                <div class="mt-5 md:mt-0">
                                    <a href="{{ route('candidates.index', $notification->data['id_vacant']) }}"
                                        class="bg-indigo-600 py-2 px-6 rounded text-white text-xs font-bold uppercase text-center">
                                        Ver candidatos
                                    </a>
                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-800 dark:text-gray-200">
                                No hay notificaciones nuevas
                            </p>
                        @endforelse
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
