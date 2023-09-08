<x-app-layout>
    <x-slot name="sub_header_two">
        <div class="flex grow gap-2 flex-wrap items-center">
            @if (isset($sub_header_two))
            {{$sub_header_two}}
            @endif
        </div>
    </x-slot>
    <div class="bg-white dark:bg-gray-900">
        {{ $slot }}
    </div>

</x-app-layout>
