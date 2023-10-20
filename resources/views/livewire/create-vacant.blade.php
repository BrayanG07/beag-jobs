<form class="md:w-1/2 space-y-5">
    <div>
        <x-input-label for="title" :value="__('Titulo Vacante')" />
        <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')"
            placeholder="Titulo Vacante" autocomplete="title" />
        <x-input-error :messages="$errors->get('title')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="salary" :value="__('Salario Mensual')" />
        <select id="salary" name="salary"
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
            focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
            rounded-md shadow-sm">

            <option value="">-- Seleccione --</option>
            @foreach ($salaries as $salary)
                <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
            @endforeach

        </select>
    </div>
    <div>
        <x-input-label for="category" :value="__('Categoria')" />
        <select id="category" name="category"
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
            focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
            rounded-md shadow-sm">

            <option value="">-- Seleccione --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category }}</option>
            @endforeach


        </select>
    </div>
    <div>
        <x-input-label for="company" :value="__('Empresa')" />
        <x-text-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')"
            placeholder="Empresa: ej. Microsoft, Netflix, Shopify" autocomplete="company" />
        <x-input-error :messages="$errors->get('company')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="last_day" :value="__('Ultimo dia de postulacion')" />
        <x-text-input id="last_day" class="block mt-1 w-full" type="date" name="last_day" :value="old('last_day')" />
        <x-input-error :messages="$errors->get('last_day')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="last_day" :value="__('Descripción del puesto')" />
        <textarea
            class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300
            focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600
            rounded-md shadow-sm"
            name="description" id="description" :value="old('description')" cols="30" rows="10"
            placeholder="Descripción general del puesto">
        </textarea>
        <x-input-error :messages="$errors->get('description')" class="mt-2" />
    </div>
    <div>
        <x-input-label for="image" class="mb-2" :value="__('Imagen')" />
        <input type="file" name="image" id="image"
            class="block w-full text-sm text-slate-500
            file:mr-4 file:py-2 file:px-4
            file:rounded-full file:border-0
            file:text-sm file:font-semibold
            file:bg-violet-50 file:text-gray-700
            hover:file:bg-violet-100
            " />
        <x-input-error :messages="$errors->get('image')" class="mt-2" />
    </div>

    <x-primary-button class="w-full justify-center">
        {{ __('Crear vacante') }}
    </x-primary-button>

</form>
