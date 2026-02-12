{{-- resources/views/livewire/cart-component.blade.php --}}
<div class="relative" x-data="{ open: false }">
    {{-- Trigger --}}
    <button type="button"
            @click="open = !open"
            class="flex items-center gap-2 rounded-xl bg-pink-200 px-4 py-2 text-pink-900 shadow-sm transition hover:bg-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-offset-2">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>

        <span class="font-semibold">Cart</span>

        @if($this->cartCount > 0)
            <span class="inline-flex h-6 min-w-6 items-center justify-center rounded-full bg-pink-600 px-2 text-xs font-bold text-white">
                {{ $this->cartCount }}
            </span>
        @endif
    </button>

    {{-- Dropdown --}}
    <div x-show="open"
         x-cloak
         @click.outside="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-1 scale-95"
         x-transition:enter-end="opacity-100 translate-y-0 scale-100"
         class="absolute right-0 z-50 mt-3 w-80 rounded-2xl border border-pink-200 bg-white p-4 shadow-2xl md:w-96">

        {{-- Header --}}
        <div class="flex items-center justify-between border-b border-pink-100 pb-2">
            <div>
                <h3 class="text-lg font-semibold text-pink-900">Your Cart</h3>
                <p class="text-xs text-gray-500">Sweet picks, almost yours 🍓</p>
            </div>

            <button type="button"
                    @click="open = false"
                    class="rounded-lg px-2 py-1 text-sm text-gray-500 hover:bg-pink-50 hover:text-pink-700">
                ✕
            </button>
        </div>

        @if(count($this->cartItems) === 0)
            {{-- Empty --}}
            <div class="py-6 text-center">
                <p class="text-gray-500">Your cart is empty.</p>
                <a href="{{ route('products.index') }}"
                   class="mt-4 inline-flex items-center gap-2 rounded-xl bg-pink-600 px-5 py-2 text-white font-semibold hover:bg-pink-700 transition">
                    Browse Products <span aria-hidden="true">→</span>
                </a>
            </div>
        @else
            {{-- Steps with arrows --}}
            <div class="mt-3 flex items-center justify-between rounded-xl bg-pink-50 px-3 py-2 text-xs font-semibold text-pink-900 border border-pink-100">
                <span>Pick</span>
                <span class="text-pink-400">→</span>
                <span>Cart</span>
                <span class="text-pink-400">→</span>
                <span>Checkout</span>
                <span class="text-pink-400">→</span>
                <span>Delivered</span>
            </div>

            {{-- Items --}}
            <ul class="mt-3 space-y-3 max-h-64 overflow-y-auto pr-1">
                @foreach($this->cartItems as $item)
                    <li class="flex gap-3 rounded-xl bg-white p-2 border border-pink-100 hover:shadow-sm transition">
                        @if(isset($item['product']) && $item['product'] && $item['product']->image)
                            <img src="{{ asset('storage/' . $item['product']->image) }}"
                                 alt="{{ $item['product']->name }}"
                                 class="h-14 w-14 shrink-0 rounded-lg object-cover">
                        @else
                            <div class="h-14 w-14 shrink-0 rounded-lg bg-pink-200 flex items-center justify-center text-pink-800 text-xs font-semibold">
                                No img
                            </div>
                        @endif

                        <div class="min-w-0 flex-1">
                            <p class="truncate font-semibold text-gray-900">
                                {{ $item['product']->name ?? ($item['name'] ?? 'Item') }}
                            </p>

                            <p class="text-sm text-pink-700">
                                Rs {{ number_format(($item['product']->price ?? $item['price'] ?? 0), 2) }}
                                × {{ $item['quantity'] ?? $item['qty'] ?? 1 }}
                            </p>

                            <p class="text-sm font-bold text-pink-900">
                                Rs {{ number_format($item['line_total'] ?? 0, 2) }}
                            </p>
                        </div>

                        <div class="flex flex-col items-end justify-between">
                            <button type="button"
                                    wire:click="removeFromCart({{ $item['product']->id ?? $item['id'] ?? 0 }})"
                                    class="text-xs font-semibold text-red-600 hover:text-red-800">
                                Remove
                            </button>
                        </div>
                    </li>
                @endforeach
            </ul>

            {{-- Total --}}
            <div class="mt-4 border-t border-pink-100 pt-3">
                <p class="flex justify-between text-base font-semibold text-pink-900">
                    <span>Total</span>
                    <span>Rs {{ number_format($this->cartTotal, 2) }}</span>
                </p>
                <p class="mt-1 text-xs text-gray-500">
                    Delivery will be shown at checkout.
                </p>
            </div>

            {{-- Buttons --}}
            <div class="mt-4 grid grid-cols-2 gap-3">
                <a href="{{ route('cart.index') }}"
                   class="inline-flex items-center justify-center rounded-xl border border-pink-300 bg-white px-4 py-2 font-semibold text-pink-700 hover:bg-pink-50 transition">
                    View Cart →
                </a>

                <a href="{{ route('checkout.index') }}"
                   class="inline-flex items-center justify-center rounded-xl bg-pink-600 px-4 py-2 font-semibold text-white hover:bg-pink-700 transition">
                    Checkout →
                </a>
            </div>

            <p class="mt-3 text-center text-xs text-gray-500">
                Tip: Review in “View Cart” before checkout.
            </p>
        @endif
    </div>
</div>
