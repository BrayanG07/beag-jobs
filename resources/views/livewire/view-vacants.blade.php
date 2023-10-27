<div>
    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        @forelse ($vacants as $vacant)
            <div
                class="p-6 text-gray-900 border-b border-gray-200 dark:text-gray-100 md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="#" class="text-xl font-bold">
                        {{ $vacant->title }}
                    </a>
                    <p class="text-sm text-gray-600 dark:text-gray-100 font-bold">
                        Empresa: {{ $vacant->company }}
                    </p>
                    <p class="text-sm text-gray-500 dark:text-gray-100">
                        Último día postulación: {{ $vacant->last_day->format('d/m/Y') }}
                    </p>
                </div>

                <div class="flex flex-col md:flex-row items-stretch gap-3  mt-5 md:mt-0">
                    <a href="#"
                        class="bg-indigo-600 py-2 px-4 rounded text-white text-xs font-bold uppercase text-center">
                        Candidatos
                    </a>
                    <a href="#"
                        class="bg-amber-600 py-2 px-6 rounded text-white text-xs font-bold uppercase text-center">
                        Editar
                    </a>
                    <a href="#"
                        class="bg-red-600 py-2 px-5 rounded text-white text-xs font-bold uppercase text-center">
                        Eliminar
                    </a>
                </div>
            </div>
        @empty
            <p class="p-6 text-gray-900 dark:text-gray-100">No hay vacantas para mostrar.</p>
        @endforelse

    </div>

    <div class="mt-10">
        {{ $vacants->links() }}
    </div>

</div>
