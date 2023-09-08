<x-dashboard-layout>
    <x-slot name="sub_header_two">
        <div class="bg-gray-200 dark:bg-gray-900 grow py-2 mb-1 rounded-bl-md rounded-br-md uppercase font-bold px-2">
            Module Dashboard
        </div>
    </x-slot>
    <div class="container mx-auto p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 w-full">
            <a href={{route('cervicalCancer.index')}} class="p-4 text-center flex items-center
                font-extrabold rounded-md bg-orange-500 text-white hover:text-slate-100
                outline-2 outline-gray-300 shadow-md hover:bg-orange-400
                 transition-all duration-150 hover:shadow-lg">
                CERVICAL CANCER SCREENING
            </a>

            <div class="p-20 rounded-md bg-gray-100 dark:bg-gray-800 outline-2 outline-gray-300 shadow-md"></div>
            <div class="p-20 rounded-md bg-gray-100 dark:bg-gray-800 outline-2 outline-gray-300 shadow-md"></div>
            <div class="p-20 rounded-md bg-gray-100 dark:bg-gray-800 outline-2 outline-gray-300 shadow-md"></div>
            <div class="p-20 rounded-md bg-gray-100 dark:bg-gray-800 outline-2 outline-gray-300 shadow-md"></div>
            <div class="p-20 rounded-md bg-gray-100 dark:bg-gray-800 outline-2 outline-gray-300 shadow-md"></div>
            <div class="p-20 rounded-md bg-gray-100 dark:bg-gray-800 outline-2 outline-gray-300 shadow-md"></div>
            <div class="p-20 rounded-md bg-gray-100 dark:bg-gray-800 outline-2 outline-gray-300 shadow-md"></div>
        </div>
    </div>

</x-dashboard-layout>
