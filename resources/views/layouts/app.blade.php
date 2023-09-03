<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" scroll-smooth h-full">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script></script>
    @livewireStyles()
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="font-sans antialiased h-full">
    <div x-data class="w-full min-h-screen bg-gray-100 dark:bg-gray-900">
        <!-- Page Content -->
        <main class="w-full h-full">
            @if(isset($side_panel))
            <div class="h-screen hidden md:block
                fixed left-0 top-0 bottom-0
                w-[23%] overscroll-contain">
                <div>
                    <div class="flex shrink-0 justify-center items-center bg-white dark:bg-gray-900">
                        <a href="{{ route('dashboard') }}">
                            <x-application-logo
                                class="block h-[106px] w-24 fill-current text-gray-800 dark:text-gray-200" />
                        </a>
                    </div>
                </div>
                <div class="h-screen overflow-y-auto">
                    @if (isset($side_panel_content))
                    {{ $side_panel_content}}
                    @endif
                </div>
            </div>

            <div name="main-content" class="w-full md:w-[77%] md:translate-x-[29.9%]">
                <!-- content header -->
                <div class="sticky top-0 z-30">
                    <div class="flex flex-wrap gap-20">
                        <div class="flex flex-col grow">

                            <!-- main page heading -->
                            @include('layouts.navigation')
                            <!-- Page Heading -->
                            <header
                                class="flex items-center grow px-1 bg-orange-500 text-gray-900 dark:text-gray-100 dark:bg-gray-800 shadow">
                                <div class=" md:hidden">
                                    @if (isset($sub_header_one))
                                    {{ $sub_header_one }}
                                    @endif
                                </div>

                                <div class="flex items-center justify-center grow">
                                    @if (isset($sub_header_two))
                                    {{ $sub_header_two}}
                                    @endif
                                </div>
                            </header>
                        </div>
                    </div>
                </div>
                <!-- content layout -->
                <div>
                    {{ $slot }}
                </div>
            </div>
            @else
            <div name="main-content" class="w-full">
                <!-- content header -->
                <div class="sticky top-0 z-10">
                    <div class="flex flex-wrap">
                        <!-- Extra logo -->
                        <div class="flex items-center pl-6 bg-white justify-center">
                            <a href="{{ route('homepage') }}">
                                <x-application-logo
                                    class="block h-[106px] w-24 fill-current text-gray-800 dark:text-gray-200" />
                            </a>
                        </div>
                        <div class="flex flex-col grow">
                            <!-- main page heading -->
                            @include('layouts.navigation')
                            <!-- Page Heading -->
                            <header
                                class="flex items-center grow px-1 bg-orange-500 text-gray-900 dark:text-gray-100 dark:bg-gray-800 shadow">
                                <div class=" md:hidden">
                                    @if (isset($sub_header_one))
                                    {{ $sub_header_one }}
                                    @endif
                                </div>

                                <div class="flex items-center justify-center grow">
                                    @if (isset($sub_header_two))
                                    {{ $sub_header_two}}
                                    @endif
                                </div>
                            </header>
                        </div>
                    </div>
                </div>
                <!-- content layout -->
                <div>
                    {{ $slot }}
                </div>
            </div>
            @endif
        </main>
    </div>
    @livewireScripts()
</body>

</html>
