<div class="p-5 mt-10 flex flex-col justify-center items-center border rounded-md">
    <h3 class="text-center text-2xl font-bold my-4 text-gray-800 dark:text-gray-200">
        Postularme a esta vacante
    </h3>


    @if (session()->has('message'))
        <x-alert-success :message="session('message')" />
    @else
        <form action="w-96 mt-5" wire:submit.prevent="storeApplyVacancy">
            <div class="mb-4">
                <x-input-label for="cv" :value="__('Curriculum o Hoja de vida')" />
                <x-text-input id="cv" wire:model="cv" class="block mt-1 w-full" type="file" accept=".pdf" />
                <x-input-error :messages="$errors->get('cv')" class="mt-2" />
            </div>

            <x-primary-button class="w-full justify-center">
                {{ __('Postularme') }}
            </x-primary-button>
        </form>
    @endif
</div>