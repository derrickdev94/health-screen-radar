<x-app-layout>
    <x-slot name="side_panel">
        <x-slot name="side_panel_content">
            <div
                class="py-4 text-slate-900 dark:text-slate-200 bg-gray-200 dark:bg-gray-900 text-center text-lg uppercase font-extrabold">
                Cervical Cancer Screening form
            </div>
            <div class="flex flex-col pb-32 ml-3 rounded-t-md bg-gray-50 dark:bg-gray-700">
                <ul class="">
                    <li class="rounded-t-md">
                        <x-responsive-nav-link :href="route('cervicalCancer.index')"
                            :active="request()->routeIs('cervicalCancer.index')" class="rounded-t-md
                            rounded-bl-md border-b border-b-gray-300 dark:border-b-gray-600
                            hover:border-b-gray-300 focus:border-b-gray-300
                            {{ request()->routeIs('cervicalCancer.index')? 'border-b-indigo-600 dark:border-b-indigo-600':''}}
                            border-l-4 border-l-gray-400 dark:border-l-gray-500
                            {{ request()->routeIs('cervicalCancer.index')? 'border-l-indigo-600 dark:border-l-indigo-600':''}}
                            hover:border-l-indigo-400 dark:hover:border-l-indigo-400
                            focus:border-l-indigo-400 dark:focus:border-l-indigo-400
                            dark:border-gray-600">
                            {{ __('Dasboard') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="">
                        <x-responsive-nav-link :href="route('cervicalCancer.create')"
                            :active="request()->routeIs('cervicalCancer.create')"
                            class="rounded-t-md
                            rounded-bl-md border-b border-b-gray-300 dark:border-b-gray-600
                            hover:border-b-gray-300 focus:border-b-gray-300
                            {{ request()->routeIs('cervicalCancer.create')? 'border-b-indigo-600 dark:border-b-indigo-600':''}}
                            border-l-4 border-l-gray-400 dark:border-l-gray-500
                            {{ request()->routeIs('cervicalCancer.create')? 'border-l-indigo-600 dark:border-l-indigo-600':''}}
                            hover:border-l-indigo-400 dark:hover:border-l-indigo-400
                            focus:border-l-indigo-400 dark:focus:border-l-indigo-400
                            dark:border-gray-600">
                            {{ __('New Screening') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="">
                        <x-responsive-nav-link :href="route('cervicalCancer.clientInfo')"
                            :active="request()->routeIs('cervicalCancer.clientInfo')"
                            class="rounded-t-md
                            rounded-bl-md border-b border-b-gray-300 dark:border-b-gray-600
                            hover:border-b-gray-300 focus:border-b-gray-300
                            {{ request()->routeIs('cervicalCancer.clientInfo')? 'border-b-indigo-600 dark:border-b-indigo-600':''}}
                            border-l-4 border-l-gray-400 dark:border-l-gray-500
                            {{ request()->routeIs('cervicalCancer.clientInfo')? 'border-l-indigo-600 dark:border-l-indigo-600':''}}
                            hover:border-l-indigo-400 dark:hover:border-l-indigo-400
                            focus:border-l-indigo-400 dark:focus:border-l-indigo-400
                            dark:border-gray-600">
                            {{ __('View Client Info') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="">
                        <x-responsive-nav-link :href="route('cervicalCancer.basicInfo')"
                            :active="request()->routeIs('cervicalCancer.basicInfo')"
                            class="rounded-t-md
                            rounded-bl-md border-b border-b-gray-300 dark:border-b-gray-600
                            hover:border-b-gray-300 focus:border-b-gray-300
                            {{ request()->routeIs('cervicalCancer.basicInfo')? 'border-b-indigo-600 dark:border-b-indigo-600':''}}
                            border-l-4 border-l-gray-400 dark:border-l-gray-500
                            {{ request()->routeIs('cervicalCancer.basicInfo')? 'border-l-indigo-600 dark:border-l-indigo-600':''}}
                            hover:border-l-indigo-400 dark:hover:border-l-indigo-400
                            focus:border-l-indigo-400 dark:focus:border-l-indigo-400
                            dark:border-gray-600">
                            {{ __('View Basic Info') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="">
                        <x-responsive-nav-link :href="route('cervicalCancer.clientAddress')"
                            :active="request()->routeIs('cervicalCancer.clientAddress')"
                            class="rounded-t-md
                            rounded-bl-md border-b border-b-gray-300 dark:border-b-gray-600
                            hover:border-b-gray-300 focus:border-b-gray-300
                            {{ request()->routeIs('cervicalCancer.clientAddress')? 'border-b-indigo-600 dark:border-b-indigo-600':''}}
                            border-l-4 border-l-gray-400 dark:border-l-gray-500
                            {{ request()->routeIs('cervicalCancer.clientAddress')? 'border-l-indigo-600 dark:border-l-indigo-600':''}}
                            hover:border-l-indigo-400 dark:hover:border-l-indigo-400
                            focus:border-l-indigo-400 dark:focus:border-l-indigo-400
                            dark:border-gray-600">
                            {{ __('View Client Address') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="">
                        <x-responsive-nav-link :href="route('cervicalCancer.clientGeneralEligiblity')"
                            :active="request()->routeIs('cervicalCancer.clientGeneralEligiblity')"
                            class="rounded-t-md
                            rounded-bl-md border-b border-b-gray-300 dark:border-b-gray-600
                            hover:border-b-gray-300 focus:border-b-gray-300
                            {{ request()->routeIs('cervicalCancer.clientGeneralEligiblity')? 'border-b-indigo-600 dark:border-b-indigo-600':''}}
                            border-l-4 border-l-gray-400 dark:border-l-gray-500
                            {{ request()->routeIs('cervicalCancer.clientGeneralEligiblity')? 'border-l-indigo-600 dark:border-l-indigo-600':''}}
                            hover:border-l-indigo-400 dark:hover:border-l-indigo-400
                            focus:border-l-indigo-400 dark:focus:border-l-indigo-400
                            dark:border-gray-600">
                            {{ __('View General Eligiblity') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="">
                        <x-responsive-nav-link :href="route('cervicalCancer.clientCurrentEligiblity')"
                            :active="request()->routeIs('cervicalCancer.clientCurrentEligiblity')"
                            class="rounded-t-md
                            rounded-bl-md border-b border-b-gray-300 dark:border-b-gray-600
                            hover:border-b-gray-300 focus:border-b-gray-300
                            {{ request()->routeIs('cervicalCancer.clientCurrentEligiblity')? 'border-b-indigo-600 dark:border-b-indigo-600':''}}
                            border-l-4 border-l-gray-400 dark:border-l-gray-500
                            {{ request()->routeIs('cervicalCancer.clientCurrentEligiblity')? 'border-l-indigo-600 dark:border-l-indigo-600':''}}
                            hover:border-l-indigo-400 dark:hover:border-l-indigo-400
                            focus:border-l-indigo-400 dark:focus:border-l-indigo-400
                            dark:border-gray-600">
                            {{ __('View Current Eligiblity') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="">
                        <x-responsive-nav-link :href="route('cervicalCancer.riskClassification')"
                            :active="request()->routeIs('cervicalCancer.riskClassification')"
                            class="rounded-t-md
                            rounded-bl-md border-b border-b-gray-300 dark:border-b-gray-600
                            hover:border-b-gray-300 focus:border-b-gray-300
                            {{ request()->routeIs('cervicalCancer.riskClassification')? 'border-b-indigo-600 dark:border-b-indigo-600':''}}
                            border-l-4 border-l-gray-400 dark:border-l-gray-500
                            {{ request()->routeIs('cervicalCancer.riskClassification')? 'border-l-indigo-600 dark:border-l-indigo-600':''}}
                            hover:border-l-indigo-400 dark:hover:border-l-indigo-400
                            focus:border-l-indigo-400 dark:focus:border-l-indigo-400
                            dark:border-gray-600">
                            {{ __('View Client Risk Analysis') }}
                        </x-responsive-nav-link>
                    </li>
                    <li class="">
                        <x-responsive-nav-link :href="route('cervicalCancer.clientReferral')"
                            :active="request()->routeIs('cervicalCancer.clientReferral')"
                            class="rounded-t-md
                            rounded-bl-md border-b border-b-gray-300 dark:border-b-gray-600
                            hover:border-b-gray-300 focus:border-b-gray-300
                            {{ request()->routeIs('cervicalCancer.clientReferral')? 'border-b-indigo-600 dark:border-b-indigo-600':''}}
                            border-l-4 border-l-gray-400 dark:border-l-gray-500
                            {{ request()->routeIs('cervicalCancer.clientReferral')? 'border-l-indigo-600 dark:border-l-indigo-600':''}}
                            hover:border-l-indigo-400 dark:hover:border-l-indigo-400
                            focus:border-l-indigo-400 dark:focus:border-l-indigo-400
                            dark:border-gray-600">
                            {{ __('View Client Referrals') }}
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
