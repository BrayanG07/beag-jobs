<div>
    <livewire:search-vacants />

    <div class="py-10">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 dark:text-gray-200 mb-12 mx-3">
                Vacantes Disponibles
            </h3>

            <div class="bg-white dark:bg-gray-800 shadow-sm rounded-lg p-6 divide-y divide-gray-200">
                @forelse ($vacants as $vacant)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a href="{{ route('vacants.show', $vacant->id) }}"
                                class="text-3xl font-extrabold text-gray-600 dark:text-gray-200">
                                {{ $vacant->title }}
                            </a>
                            <p class="text-base text-gray-600 dark:text-gray-200 mb-1">{{ $vacant->company }}</p>
                            <p class="text-xs font-bold text-gray-600 dark:text-gray-200 mb-1">{{ $vacant->category->category }}</p>
                            <p class="font-bold text-xs text-gray-600 dark:text-gray-200">
                                Último día de postulación: <span
                                    class="font-normal">{{ $vacant->last_day->format('d/m/Y') }}</span>
                            </p>
                            <p class="text-base text-gray-600 dark:text-gray-200 mb-1">{{ $vacant->salary->salary }}</p>
                        </div>

                        <div class="mt-5 md:mt-0">
                            <a href="{{ route('vacants.show', $vacant->id) }}"
                                class="bg-indigo-600 p-3 text-sm uppercase font-bold text-white rounded-lg block text-center">
                                Ver Vacante
                            </a>
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
