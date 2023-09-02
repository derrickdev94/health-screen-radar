<x-content-layout>
    <x-slot name="sub_header_two">
        <div class=" grow py-2.5 px-2 bg-gray-100">Dashboard</div>
    </x-slot>
    <div class="container p-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 w-full">
            <div class="rounded-md row-span-1  bg-white outline-2 outline-gray-300 shadow-md">
                <div class="h-full flex flex-col justify-between">
                    <div class="flex gap-1 pt-3 justify-center text-gray-500 items-center">
                        <x-icons.user-group class="text-gray-500" />
                        <h1 class="font-bold text-lg capitalize">
                            Total clients
                        </h1>
                    </div>
                    <div class="flex justify-center gap-3 items-center">
                        <div class="flex flex-col text-gray-700 items-center ">
                            <p class="gap-3 text-3xl font-extrabold">
                                500
                            </p>
                            <em class="text-gray-600 text-sm">screened clients</em>
                        </div>
                        <x-icons.arrow-circle-up class="text-gray-200 bg-gray-500 rounded-md animate-pulse" size="8" />
                    </div>
                    <div class="border-2 rounded-b-md border-gray-500"> </div>
                </div>
            </div>
            <div class="rounded-md bg-white outline-2 outline-gray-300 shadow-md">
                <div class="h-full flex flex-col justify-between">
                    <div class="flex gap-1 pt-3 justify-center text-gray-500 items-center">
                        <x-icons.user-group class="text-red-500" />
                        <h1 class="font-bold text-lg capitalize">
                            Clients at risk
                        </h1>
                    </div>
                    <div class="flex justify-center gap-3 items-center">
                        <div class="flex flex-col text-gray-700 items-center ">
                            <p class="gap-3 text-3xl font-extrabold">
                                200
                            </p>
                            <em class="text-gray-600 text-sm">of screened clients</em>
                        </div>
                        <x-icons.arrow-circle-up class="text-red-200 bg-red-500 rounded-md animate-pulse" size="8" />
                    </div>
                    <div class="border-2 rounded-b-md border-red-500"> </div>
                </div>
            </div>
            <div class="rounded-md bg-white outline-2 outline-gray-300 shadow-md">
                <div class="h-full flex flex-col justify-between">
                    <div class="flex gap-1 pt-3 justify-center text-gray-500 items-center">
                        <x-icons.user-group class="text-orange-500" />
                        <h1 class="font-bold text-lg capitalize">
                            Ineligible clients
                        </h1>
                    </div>
                    <div class="flex justify-center gap-3 items-center">
                        <div class="flex flex-col text-gray-700 items-center ">
                            <p class="gap-3 text-3xl font-extrabold">
                                100
                            </p>
                            <em class="text-gray-600 text-sm">of screened clients</em>
                        </div>
                        <x-icons.arrow-circle-up class="text-orange-200 bg-orange-500 rounded-md animate-pulse" size="8" />
                    </div>
                    <div class="border-2 rounded-b-md border-orange-500"> </div>
                </div>
            </div>
            <div class="rounded-md bg-white outline-2 outline-gray-300 shadow-md">
                <div class="h-full flex flex-col justify-between">
                    <div class="flex gap-1 pt-3 justify-center text-gray-500 items-center">
                        <x-icons.user-group class="text-green-500" />
                        <h1 class="font-bold text-lg capitalize">
                            Eligible clients
                        </h1>
                    </div>
                    <div class="flex justify-center gap-3 items-center">
                        <div class="flex flex-col text-gray-700 items-center ">
                            <p class="gap-3 text-3xl font-extrabold">
                                150
                            </p>
                            <em class="text-gray-600 text-sm">of screened clients</em>
                        </div>
                        <x-icons.arrow-circle-up class="text-green-200 bg-green-500 rounded-md animate-pulse" size="8" />
                    </div>
                    <div class="border-2 rounded-b-md border-green-500"> </div>
                </div>
            </div>
        </div>
        <div class="rounded-md mt-10 py-12 h-32 col-span-4 bg-white outline-2 outline-gray-300 shadow-md">
            More analtics
        </div>
    </div>
</x-content-layout>
