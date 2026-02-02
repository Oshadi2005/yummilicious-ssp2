{{-- Cart component: pink-themed bakery style, matches site design --}}
<div class="relative" x-data="{ open: false }">
    {{-- Cart trigger button: shows count, toggles dropdown --}}
    <button type="button"
            @click="open = !open"
            class="flex items-center gap-2 rounded-lg bg-pink-200 px-4 py-2 text-pink-800 shadow-sm transition hover:bg-pink-300 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-offset-2">
        <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
        </svg>
        <span class="font-semibold">Cart</span>
        @if($this->cartCount > 0)
            <span class="inline-flex h-6 min-w-6 items-center justify-center rounded-full bg-pink-500 px-2 text-xs font-bold text-white">
                {{ $this->cartCount }}
            </span>
        @endif
    </button>

    {{-- Cart dropdown: pink-themed --}}
    <div x-show="open"
         x-cloak
         @click.outside="open = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 scale-95"
         x-transition:enter-end="opacity-100 scale-100"
         class="absolute right-0 z-50 mt-2 w-80 rounded-lg border border-pink-200 bg-white p-4 shadow-xl md:w-96">
        <h3 class="mb-3 border-b border-pink-100 pb-2 text-lg font-semibold text-pink-800">Your Cart</h3>

        @if(count($this->cartItems) === 0)
            <p class="py-4 text-center text-gray-500">Your cart is empty.</p>
        @else
            <ul class="space-y-3 max-h-64 overflow-y-auto">
                @foreach($this->cartItems as $item)
                    <li class="flex gap-3 rounded-lg bg-pink-50 p-2">
                        @if($item['product']->image)
                            <img src="{{ asset('storage/' . $item['product']->image) }}" alt="{{ $item['product']->name }}"
                                 class="h-14 w-14 shrink-0 rounded object-cover">
                        @else
                            <div class="h-14 w-14 shrink-0 rounded bg-pink-200 flex items-center justify-center text-pink-600 text-xs">No img</div>
                        @endif
                        <div class="min-w-0 flex-1">
                            <p class="truncate font-medium text-gray-800">{{ $item['product']->name }}</p>
                            <p class="text-sm text-pink-600">${{ number_format($item['product']->price, 2) }} × {{ $item['quantity'] }}</p>
                            <p class="text-sm font-semibold text-pink-700">${{ number_format($item['line_total'], 2) }}</p>
                        </div>
                        <div class="flex flex-col items-end gap-1">
                            <button type="button"
                                    wire:click="removeFromCart({{ $item['product']->id }})"
                                    class="text-xs text-red-600 hover:text-red-800">Remove</button>
                        </div>
                    </li>
                @endforeach
            </ul>
            <div class="mt-3 border-t border-pink-100 pt-3">
                <p class="flex justify-between text-lg font-semibold text-pink-800">
                    <span>Total</span>
                    <span>${{ number_format($this->cartTotal, 2) }}</span>
                </p>
            </div>
        @endif
    </div>
</div>
