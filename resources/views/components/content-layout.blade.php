<x-app-layout>
    <x-slot name="side_panel">
        <x-slot name="side_panel_content">
            <div class="py-4 bg-gray-900 text-slate-200 dark:bg-gray-900 text-center text-lg uppercase font-extrabold">
                Cervical Cancer Screening form
            </div>
            <div class="flex flex-col pb-32">
                <ul class="">
                    <li class="my-2">
                        <x-responsive-nav-link :href="route('cervicalCancer.index')"
                            :active="request()->routeIs('cervicalCancer.index')">
                            {{ __('Dasboard') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="my-2">
                        <x-responsive-nav-link :href="route('cervicalCancer.create')"
                            :active="request()->routeIs('cervicalCancer.create')">
                            {{ __('New Screening') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="my-2">
                        <x-responsive-nav-link :href="route('cervicalCancer.basicInfo')"
                            :active="request()->routeIs('cervicalCancer.basicInfo')">
                            {{ __('BASIC INFO') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="my-2">
                        <x-responsive-nav-link :href="route('cervicalCancer.clientInfo')"
                            :active="request()->routeIs('cervicalCancer.clientInfo')">
                            {{ __('CLIENT INFO') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="my-2">
                        <x-responsive-nav-link :href="route('cervicalCancer.clientAddress')"
                            :active="request()->routeIs('cervicalCancer.clientAddress')">
                            {{ __('CLIENT ADDRESS') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="my-2">
                        <x-responsive-nav-link :href="route('cervicalCancer.clientGeneralEligiblity')"
                            :active="request()->routeIs('cervicalCancer.clientGeneralEligiblity')">
                            {{ __('GENERAL ELIGIBLITY') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="my-2">
                        <x-responsive-nav-link :href="route('cervicalCancer.clientCurrentEligiblity')"
                            :active="request()->routeIs('cervicalCancer.clientCurrentEligiblity')">
                            {{ __('CURRENT ELIGIBLITY') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="my-2">
                        <x-responsive-nav-link :href="route('cervicalCancer.riskClassification')"
                            :active="request()->routeIs('cervicalCancer.riskClassification')">
                            {{ __('CLIENT RISK ANALYSIS') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="my-2">
                        <x-responsive-nav-link :href="route('cervicalCancer.clientReferral')"
                            :active="request()->routeIs('cervicalCancer.clientReferral')">
                            {{ __('CLIENT REFRRALS') }}
                        </x-responsive-nav-link>
                    </li>

                </ul>
            </div>
        </x-slot>
    </x-slot>


    <x-slot name="sub_header_two">
        <div class="flex grow gap-2 flex-wrap items-center">
            @if (isset($sub_header_two))
            {{$sub_header_two}}
            @endif
        </div>
    </x-slot>
    <div>
        {{ $slot }}
    </div>
</x-app-layout>