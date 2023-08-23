<x-app-layout>
    <x-slot name="header">
       dash
    </x-slot>
    <x-slot name="comp_header">
        <div class="flex items-center">
            @if (isset($form_header))
                {{$form_header}}
            @endif
        </div>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
