{{-- resources/views/navigation-menu.blade.php --}}
@php
    $isAdminArea = request()->is('admin*');
    $isAdminUser = auth()->check() && method_exists(auth()->user(), 'isAdmin') && auth()->user()->isAdmin();
@endphp

<nav x-data="{ open: false }" class="bg-pink-100/95 border-b border-pink-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ $isAdminUser ? route('admin.dashboard') : route('home') }}" class="flex items-center gap-2">
                        <x-application-mark class="block h-9 w-auto" />
                        <span class="hidden sm:inline text-lg font-semibold text-pink-700">Yummilicious</span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-6 sm:-my-px sm:ms-10 sm:flex sm:items-center">

                    {{-- ✅ ADMIN NAV (ONLY when admin is in /admin/*) --}}
                    @if($isAdminUser && $isAdminArea)
                        <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                            {{ __('Dashboard') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('admin.products.index') }}" :active="request()->routeIs('admin.products.*')">
                            {{ __('Manage Products') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('admin.orders.index') }}" :active="request()->routeIs('admin.orders.*')">
                            {{ __('Manage Orders') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('admin.customers.index') }}" :active="request()->routeIs('admin.customers.*')">
                            {{ __('Customers') }}
                        </x-nav-link>

                    @else
                        {{-- ✅ CUSTOMER / GUEST NAV --}}
                        <x-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">
                            {{ __('Home') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">
                            {{ __('About Us') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('testimonials') }}" :active="request()->routeIs('testimonials')">
                            {{ __('Testimonials') }}
                        </x-nav-link>

                        <x-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">
                            {{ __('Contact Us') }}
                        </x-nav-link>

                        {{-- Guest: show Order Online --}}
                        @guest
                            <x-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.*')">
                                {{ __('Order Online') }}
                            </x-nav-link>
                        @endguest

                        {{-- Customer: show Order Online --}}
                        @auth
                            @if(!$isAdminUser)
                                <x-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.*')">
                                    {{ __('Order Online') }}
                                </x-nav-link>
                            @endif
                        @endauth

                        {{-- Admin (but not in admin area): show Admin Dashboard link --}}
                        @auth
                            @if($isAdminUser)
                                <x-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">
                                    {{ __('Admin Dashboard') }}
                                </x-nav-link>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>

            <div class="hidden sm:flex sm:items-center sm:ms-6 gap-4">

                {{-- ✅ Cart ONLY for customers (never for admin area) --}}
                @auth
                    @if(!$isAdminUser && !$isAdminArea)
                        @livewire('cart-component')
                    @endif
                @endauth

                {{-- Guest: Login/Register --}}
                @guest
                    <a href="{{ route('login') }}" class="text-sm text-pink-700 hover:text-pink-800 font-medium">Log in</a>
                    @if(Route::has('register'))
                        <a href="{{ route('register') }}"
                           class="inline-flex items-center px-4 py-2 bg-pink-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-offset-2 transition">
                            Register
                        </a>
                    @endif
                @endguest

                {{-- Authenticated: Settings --}}
                @auth
                    <div class="ms-3 relative">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                @if(Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                    <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                        <img class="size-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                    </button>
                                @else
                                    <span class="inline-flex rounded-md">
                                        <button type="button"
                                                class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                            {{ Auth::user()->name }}
                                            <svg class="ms-2 -me-0.5 size-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                            </svg>
                                        </button>
                                    </span>
                                @endif
                            </x-slot>

                            <x-slot name="content">
                                <div class="block px-4 py-2 text-xs text-gray-400">{{ __('Manage Account') }}</div>
                                <x-dropdown-link href="{{ route('profile.show') }}">{{ __('Profile') }}</x-dropdown-link>

                                <div class="border-t border-gray-200"></div>
                                <form method="POST" action="{{ route('logout') }}" x-data>
                                    @csrf
                                    <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();">{{ __('Log Out') }}</x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="size-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-pink-50/95 border-t border-pink-200">
        <div class="pt-2 pb-3 space-y-1 px-4">

            {{-- ✅ ADMIN MOBILE NAV --}}
            @if($isAdminUser && $isAdminArea)
                <x-responsive-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">{{ __('Dashboard') }}</x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('admin.products.index') }}" :active="request()->routeIs('admin.products.*')">{{ __('Manage Products') }}</x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('admin.orders.index') }}" :active="request()->routeIs('admin.orders.*')">{{ __('Manage Orders') }}</x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('admin.customers.index') }}" :active="request()->routeIs('admin.customers.*')">{{ __('Customers') }}</x-responsive-nav-link>

            @else
                {{-- ✅ CUSTOMER/Guest MOBILE NAV --}}
                <x-responsive-nav-link href="{{ route('home') }}" :active="request()->routeIs('home')">{{ __('Home') }}</x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('about') }}" :active="request()->routeIs('about')">{{ __('About') }}</x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('testimonials') }}" :active="request()->routeIs('testimonials')">{{ __('Testimonials') }}</x-responsive-nav-link>
                <x-responsive-nav-link href="{{ route('contact') }}" :active="request()->routeIs('contact')">{{ __('Contact') }}</x-responsive-nav-link>

                @guest
                    <x-responsive-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.*')">{{ __('Order Online') }}</x-responsive-nav-link>
                @endguest

                @auth
                    @if($isAdminUser)
                        <x-responsive-nav-link href="{{ route('admin.dashboard') }}" :active="request()->routeIs('admin.dashboard')">{{ __('Admin Dashboard') }}</x-responsive-nav-link>
                    @else
                        <x-responsive-nav-link href="{{ route('products.index') }}" :active="request()->routeIs('products.*')">{{ __('Order Online') }}</x-responsive-nav-link>
                        <div class="py-2 border-t border-pink-200 mt-2">@livewire('cart-component')</div>
                    @endif
                @endauth
            @endif
        </div>
    </div>
</nav>
