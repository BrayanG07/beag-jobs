<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
          {{ __('Listado de Candidatos') }}
      </h2>
  </x-slot>

  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
              <div class="p-6 text-gray-900 dark:text-gray-100">
                  <h1 class="text-2xl font-bold text-center my-7">Vacante {{ $vacant->title }}</h1>
                  
                  <div class="md:flex md:justify-center p-5">
                      <ul class="divide-y divide-gray-200 w-full">
                        @forelse ($vacant->candidates as $candidate)
                          <li class="p-3 flex items-center">
                            <div class="flex-1">
                              <p class="text-xl font-medium text-gray-800 dark:text-gray-200">
                                {{ $candidate->user->name }}
                              </p>
                              <p class="text-sm text-gray-600 dark:text-gray-200">
                                {{ $candidate->user->email }}
                              </p>
                              <p class="text-sm font-medium text-gray-600 dark:text-gray-200">
                                Día de postulación: <span class="font-normal">{{ $candidate->created_at->diffForHumans() }}</span>
                              </p>
                            </div>

                            <div>
                              <a href="{{ asset('storage/cv/'. $candidate->cv) }}"
                                class="inline-flex items-center shadow-sm px-3 py-1 border border-gray-300 text-sm font-medium leading-5 rounded-full text-gray-700 bg-white hover:bg-gray-50"
                                target="_blank"
                                rel="noreferrer noopener"
                              >
                                Ver CV
                              </a>
                            </div>
                          </li>
                        @empty
                          <p class="text-center text-gray-800 dark:text-gray-200">
                            No hay candidatos para mostrar.
                          </p>
                        @endforelse
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </div>
</x-app-layout>
