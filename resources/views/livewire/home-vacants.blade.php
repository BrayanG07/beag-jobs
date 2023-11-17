<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-700 dark:text-gray-200 mb-12">
                Vacantes Disponibles
            </h3>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6">
                @forelse ($vacants as $vacant)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a href="{{ route('vacants.show', $vacant->id) }}"
                                class="text-3xl font-extrabold text-gray-600 dark:text-gray-200">
                                {{ $vacant->title }}
                            </a>
                        </div>

                        <div class="bg-indigo-600 py-2 px-6 rounded text-white text-xs font-bold uppercase text-center">
                            <a href="{{ route('vacants.show', $vacant->id) }}">Ver Vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-center text-sm text-gray-600 dark:text-gray-200">
                        No hay vacantes para mostrar.
                    </p>
                @endforelse
            </div>
        </div>
    </div>
</div>
