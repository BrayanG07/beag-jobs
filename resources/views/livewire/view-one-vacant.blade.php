<div class="p-10">
    <div class="mb-5">
        <h3 class="text-3xl font-bold text-gray-800 dark:text-gray-200 leading-tight">
            {{ $vacant->title }}
        </h3>

        <!-- La clase 'md:grid' en Tailwind CSS se utiliza para establecer un diseño de cuadrícula en pantallas medianas y más grandes. -->
        <!-- La clase 'md:grid-cols-2' en Tailwind CSS se utiliza para dividir la cuadrícula en dos columnas en pantallas medianas y más grandes. -->
        <div class="md:grid md:grid-cols-2 bg-gray-200 dark:bg-gray-600 p-4 my-5 rounded-lg">
            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200">
                Empresa:
                <!-- La clase 'normal-case' en Tailwind CSS se utiliza para establecer el texto en minúsculas, excepto la primera letra de cada palabra que se establece en mayúsculas. -->
                <span class="normal-case font-normal">{{ $vacant->company }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200">
                Último día de postulación:
                <!-- La clase 'normal-case' en Tailwind CSS se utiliza para establecer el texto en minúsculas, excepto la primera letra de cada palabra que se establece en mayúsculas. -->
                <span class="normal-case font-normal">{{ $vacant->last_day->toFormattedDateString() }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200">
                Categoría:
                <span class="normal-case font-normal">{{ $vacant->category->category }}</span>
            </p>
            <p class="font-bold text-sm uppercase text-gray-800 dark:text-gray-200">
                Salario:
                <span class="normal-case font-normal">{{ $vacant->salary->salary }}</span>
            </p>
        </div>
    </div>

    <div class="md:grid md:grid-cols-6 gap-4">

        {{-- md:col-span-2 = Quiero que tome 2 de las 6 columnas --}}
        <div class="md:col-span-2">
            <img src="{{ asset('storage/vacants') . '/'. $vacant->image }}"
                alt="Imagen de la vacante {{ $vacant->title }}">
        </div>

        <!-- La clase 'md:col-span-4' en Tailwind CSS se utiliza para que el elemento ocupe 4 de las 6 columnas en pantallas medianas y más grandes. -->
        <div class="md:col-span-4">
            <h2 class="text-2xl text-gray-800 dark:text-gray-200 font-bold mb-5">Descripcion del puesto</h2>
            <p class="text-gray-800 dark:text-gray-200">
                {{ $vacant->description }}
            </p>
        </div>
    </div>

    @guest
    <div class="mt-5 bg-gray-100 dark:bg-gray-600 border border-dashed p-5 text-center rounded-md">
        <p class="text-gray-800 dark:text-gray-200">
            ¿Deseas postular a esta vacante?
            <a href="{{ route('register') }}" class="font-bold text-green-500">Obten una cuenta y aplica a esta y otras
                vacantes</a>
        </p>
    </div>
    @endguest


    {{-- La directiva '@cannot' de Blade se utiliza para verificar si el usuario actual no tiene un determinado permiso.
    En este caso, estamos verificando si el usuario no tiene permiso para crear una instancia de 'Vacant'.
    'create' es el nombre del permiso que estamos verificando de VacantPolicy --}}
    @cannot('create', App\Models\Vacant::class)
        {{-- La sintaxis '@livewire' en Blade se utiliza para incluir un componente de Livewire en la vista.
        En este caso, 'apply-vacancy' es el nombre del componente de Livewire que se está incluyendo. --}}
        @livewire('apply-vacancy', ['vacant' => $vacant ])
    @endcannot

</div>