<div class="py-8">
    <h2 class="text-2xl md:text-4xl text-gray-800 dark:text-gray-200 text-center font-extrabold my-5">Buscar Vacantes
    </h2>

    <div class="max-w-7xl mx-auto px-5">
        <form wire:submit.prevent="readDataByForm">
            <div class="md:grid md:grid-cols-3 gap-5">
                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 dark:text-gray-200 uppercase font-bold "
                        for="termino">Término de Búsqueda
                    </label>
                    <input id="termino" type="text" placeholder="Buscar por Término: ej. Laravel"
                        class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 w-full"
                        wire:model="term" />
                </div>

                <div class="mb-5">
                    <label
                        class="block mb-1 text-sm text-gray-700 dark:text-gray-200 uppercase font-bold">Categoría</label>
                    <select class="border-gray-300 p-2 w-full" wire:model="category">
                        <option value="">--Seleccione--</option>

                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5">
                    <label class="block mb-1 text-sm text-gray-700 dark:text-gray-200 uppercase font-bold">Salario
                        Mensual</label>
                    <select class="border-gray-300 p-2 w-full" wire:model="salary">
                        <option value="">-- Seleccione --</option>
                        @foreach ($salaries as $salary)
                            <option value="{{ $salary->id }}">{{ $salary->salary }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="flex justify-end">
                <input type="submit"
                    class="bg-indigo-600 hover:bg-indigo-700 transition-colors text-white text-sm font-bold px-10 py-2 rounded cursor-pointer uppercase w-full md:w-auto"
                    value="Buscar" />
            </div>
        </form>
    </div>
</div>
