<x-content-layout>
    <x-slot name="form_side_panel">
        <div class="py-4 bg-gray-200 dark:bg-gray-900 text-center text-2xl font-extrabold">Dashboard</div>
        <div class="flex flex-col">
            <div class="text-md text-justify font-semibold py-3 px-4">View client data</div>
        </div>
    </x-slot>
    <x-slot name="form_header">
        <div class="grow uppercase text-center text-lg font-extrabold">
           Cervical cancer screening form
        </div>
        <div class=" mr-auto">
            <livewire:reactive-header />
        </div>
        <div class="flex grow px-4 justify-end gap-1 items-center">
            <x-primary-button>
                <x-icons.document size="4" />
                Save
            </x-primary-button>
            <x-primary-button class=" bg-red-500 hover:bg-red-600 dark:bg-red-500 dark:hover:bg-red-600">
                <x-icons.trash size="4" />
                delete
            </x-primary-button>
        </div>
    </x-slot>
<section>
    <livewire:new-cervical-screening />
</section>
</x-content-layout>
