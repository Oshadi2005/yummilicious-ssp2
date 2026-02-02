<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center sticky top-0 z-50">
    <!-- Logo -->
    <div class="flex items-center space-x-3">
        <img src="{{ asset('images/logo.jpeg') }}" alt="Yummilicious Logo" class="h-10 w-10 rounded-full">
        <h1 class="text-2xl font-bold text-pink-600">Yummilicious</h1>
    </div>

    <!-- Navigation Links -->
    <ul class="flex space-x-6 text-sm font-medium items-center">
        <li><a href="{{ route('home') }}" class="hover:text-pink-600">Home</a></li>
        <li><a href="{{ route('about') }}" class="hover:text-pink-600">About Us</a></li>
        <li><a href="{{ route('testimonials') }}" class="hover:text-pink-600">Testimonials</a></li>
        <li><a href="{{ route('products.index') }}" class="text-pink-600 underline">Order Online</a></li>
        <li><a href="{{ route('contact') }}" class="hover:text-pink-600">Contact Us</a></li>

        @auth
            <!-- Cart Icon with Live Count -->
            <li class="relative">
                <a href="{{ route('cart.index') }}" class="flex items-center hover:text-pink-600">
                    🛒
                    <span class="ml-1 font-bold" wire:poll.visible.1000ms="refreshCartCount">
                        {{ $cartCount }}
                    </span>
                </a>
            </li>

            <!-- User Dropdown -->
            <li class="relative">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-700 hover:text-pink-600">
                            {{ Auth::user()->name }}
                            <svg class="ml-1 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                Logout
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </li>
        @else
            <li><a href="{{ route('login') }}" class="hover:text-pink-600">Login</a></li>
            <li><a href="{{ route('register') }}" class="hover:text-pink-600">Register</a></li>
        @endauth
    </ul>
</nav>
