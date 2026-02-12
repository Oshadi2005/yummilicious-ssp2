<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Admin Panel' }} - Yummilicious</title>

    {{-- Tailwind / Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-pink-50 text-gray-800">

<div class="flex min-h-screen">

    {{-- Sidebar --}}
    <aside class="w-64 bg-pink-100 border-r border-pink-200 shadow-sm fixed inset-y-0 left-0">
        <div class="p-6 border-b border-pink-200">
            <h1 class="text-2xl font-extrabold text-pink-700">Yummilicious</h1>
            <p class="text-sm text-pink-600 mt-1">Admin Panel</p>
        </div>

        <nav class="p-4">
            <ul class="space-y-2 font-semibold text-pink-800">
                <li>
                    <a href="{{ route('admin.dashboard') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-pink-200 transition
                       {{ request()->routeIs('admin.dashboard') ? 'bg-pink-200' : '' }}">
                        📊 Dashboard
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.products.index') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-pink-200 transition
                       {{ request()->routeIs('admin.products.*') ? 'bg-pink-200' : '' }}">
                        🍰 Products
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.orders.index') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-pink-200 transition
                       {{ request()->routeIs('admin.orders.*') ? 'bg-pink-200' : '' }}">
                        🛒 Orders
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.customers.index') }}"
                       class="block px-4 py-3 rounded-xl hover:bg-pink-200 transition
                       {{ request()->routeIs('admin.customers.*') ? 'bg-pink-200' : '' }}">
                        👥 Customers
                    </a>
                </li>
            </ul>

            <div class="mt-6 border-t border-pink-200 pt-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full text-left px-4 py-3 rounded-xl bg-pink-500 text-white font-bold hover:bg-pink-600 transition">
                        🚪 Logout
                    </button>
                </form>
            </div>
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="flex-1 ml-64 p-8">
        {{-- Top Bar --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-3xl font-extrabold text-pink-700">{{ $header ?? 'Admin Dashboard' }}</h2>
                <p class="text-sm text-gray-600 mt-1">Manage your bakery system securely.</p>
            </div>

            <div class="bg-white px-4 py-2 rounded-xl shadow border border-pink-100">
                <p class="text-sm text-gray-500">Logged in as</p>
                <p class="font-bold text-pink-700">{{ auth()->user()->name ?? 'Admin' }}</p>
            </div>
        </div>

        {{-- Flash Success --}}
        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl bg-green-100 border border-green-200 text-green-800 font-semibold">
                ✅ {{ session('success') }}
            </div>
        @endif

        {{-- Flash Error --}}
        @if(session('error'))
            <div class="mb-6 p-4 rounded-xl bg-red-100 border border-red-200 text-red-800 font-semibold">
                ❌ {{ session('error') }}
            </div>
        @endif

        {{-- Page Content --}}
        <div class="bg-white rounded-2xl shadow border border-pink-100 p-6">
            @yield('content')
        </div>
    </main>

</div>

</body>
</html>
