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
                <x-alert-success :message="session('message')" />
            @endif

            <livewire:view-vacants />
        </div>
    </div>
</x-app-layout>
