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
</head>

<body class="font-sans antialiased h-full">
    <div class="w-full min-h-screen bg-gray-100 dark:bg-gray-900">
        <div class="sticky top-0 z-50">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="flex items-center bg-white text-gray-900 dark:text-gray-100 dark:bg-gray-800 shadow">
                    <div class=" max-w-7xl w-1/4 py-2 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                    @if (isset($comp_header))
                        <div class="flex items-center grow">
                            {{ $comp_header }}
                        </div>
                    @endif
                </header>
            @endif
        </div>

        <!-- Page Content -->
        <main class="w-full grid">
            @if (isset($side_panel))
                <aside
                    class="scroll-m-0 min-h-screen  scroll-p-0 hidden md:block h-screen fixed w-[23%] overflow-y-scroll left-0 top-25">
                    {{ $side_panel }}
                </aside>
                <div class="w-full {{ $side_panel ? 'md:w-[76%] md:ml-64' : '' }} ">
                    {{ $slot }}
                </div>
            @else
                <div class="w-full">
                    {{ $slot }}
                </div>
            @endif
        </main>
    </div>
    @livewireScripts()
</body>

</html>
