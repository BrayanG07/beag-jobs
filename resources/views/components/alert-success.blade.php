@props(['message'])

<div class="bg-green-500 text-white px-4 py-2 rounded-lg shadow-md mb-2">
    <div class="flex items-center">
        <div class="mr-2">
            <svg class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                <path d="M0 11l2-2 5 5L18 3l2 2L7 18z" />
            </svg>
        </div>
        <div>
            <span class="font-bold">Éxito:</span>
            <span class="ml-2">{{ $message }}</span>
        </div>
    </div>
</div>