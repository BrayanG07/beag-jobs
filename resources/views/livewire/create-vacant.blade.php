<form class="md:w-1/2 space-y-5" wire:submit.prevent="createVacant">
    <div>
        <x-input-label for="title" :value="__('Titulo Vacante')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" wire:model="title" :value="old('title')"
            placeholder="Titulo Vacante" autocomplete="title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="salary" :value="__('Salario Mensual')" />
        <select id="salary" wire:model="salary"
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
            focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
            rounded-md shadow-sm">

            <option value="">-- Seleccione --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach

        </select>
        <x-input-error :messages="$errors->get('salary')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="category" :value="__('Categoria')" />
        <select id="category" wire:model="category"
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
            focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
            rounded-md shadow-sm">

            <option value="">-- Seleccione --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach

        </select>
        <x-input-error :messages="$errors->get('category')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="company" :value="__('Empresa')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" wire:model="company" :value="old('company')"
            placeholder="Empresa: ej. Microsoft, Netflix, Shopify" autocomplete="company" />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="last_day" :value="__('Ultimo dia de postulacion')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" wire:model="last_day" :value="old('last_day')" />
        <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="description" :value="__('Descripción del puesto')" />
        <textarea
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
            focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
            rounded-md shadow-sm"
            wire:model="description" id="description" cols="30" rows="10"
            placeholder="Descripción general del puesto">
        </textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="image" class="mb-2" :value="__('Imagen')" />
        <input type="file" wire:model="image" id="image"
            class="block w-full text-sm text-slate-500
            file:mr-4 file:py-2 file:px-4
            file:rounded-full file:border-0
            file:text-sm file:font-semibold
            file:bg-violet-50 file:text-gray-700
            hover:file:bg-violet-100"
            accept="image/*" />

        <div class="my-5 w-80 mx-auto">
            @if ($image)
                <img src="{{ $image->temporaryUrl() }}" alt="Previsualizacion de la imagen de la vancante">
            @endif
        </div>
        
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <x-primary-button class="w-full justify-center">
        {{ __('Crear vacante') }}
    </x-primary-button>

</form>
