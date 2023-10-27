<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mis Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Si existe un mensaje --}}
            @if (session()->has('message'))
                <div class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md mb-2">
                    <div class="flex items-center">
                        <div class="mr-2">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
                            </svg>
                        </div>
                        <div>
                            <span class="font-bold">Éxito:</span>
                            <span class="ml-2">{{ session('message') }}</span>
                        </div>
                    </div>
                </div>
            @endif

            <livewire:view-vacants />
        </div>
    </div>
</x-app-layout>
