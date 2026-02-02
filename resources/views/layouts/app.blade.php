<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Yummilicious') }}</title>

    <!-- Elegant bakery fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=quicksand:400,500,600,700|dancing-script:400,500,600,700&display=swap" rel="stylesheet" />

    <!-- Vite (CSS & JS) -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire -->
    @livewireStyles
</head>

<body class="antialiased bg-pink-50 text-gray-800">
    <!-- Banner -->
    <x-banner />

    <div class="min-h-screen flex flex-col">
        <!-- Navigation Menu (Livewire) -->
        @livewire('navigation-menu')

        <!-- Page Header -->
        @if (isset($header))
            <header class="bg-white/80 shadow-sm border-b border-pink-100">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Main Content -->
        <main class="flex-1">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gradient-to-r from-pink-100 to-pink-200 py-6 text-gray-700 mt-12">
            <div class="max-w-7xl mx-auto px-4 flex flex-col md:flex-row justify-between items-center gap-4">
                <!-- Contact Info -->
                <div class="flex flex-wrap items-center justify-center gap-6 text-sm">
                    <p class="flex items-center gap-2">📍 <span>27, De Alwis Place, Dehiwala</span></p>
                    <p class="flex items-center gap-2">📞 <a href="tel:0785487015" class="hover:text-pink-600 transition">0785487015</a></p>
                    <p class="flex items-center gap-2">📧 <a href="mailto:yummiliciouscakehouse@gmail.com" class="hover:text-pink-600 transition">yummiliciouscakehouse@gmail.com</a></p>
                </div>

                <!-- Copyright -->
                <p class="text-xs text-center md:text-right mt-4 md:mt-0">&copy; {{ date('Y') }} Yummilicious Bakery. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Modals -->
    @stack('modals')

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
