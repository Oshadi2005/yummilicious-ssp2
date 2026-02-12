<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Panel - Yummilicious</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-pink-50 min-h-screen">

    {{-- Top Admin Nav ONLY --}}
    <nav class="bg-pink-100 border-b border-pink-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-16 flex items-center justify-between">
            <div class="flex items-center gap-6">
                <a href="{{ route('admin.dashboard') }}" class="font-bold text-pink-700 flex items-center gap-2">
                    <span class="text-xl">🍰</span> Yummilicious Admin
                </a>

                <div class="hidden sm:flex items-center gap-6 text-sm font-semibold text-pink-700">
                    <a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a>
                    <a href="{{ route('admin.products.index') }}" class="hover:underline">Manage Products</a>
                    <a href="{{ route('admin.orders.index') }}" class="hover:underline">Manage Orders</a>
                    <a href="{{ route('admin.customers.index') }}" class="hover:underline">Customers</a>
                </div>
            </div>

            <div class="flex items-center gap-3">
                <span class="text-sm text-pink-800 font-medium hidden sm:inline">
                    {{ auth()->user()->name }}
                </span>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="px-4 py-2 rounded-lg bg-pink-500 text-white text-sm font-semibold hover:bg-pink-600">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
