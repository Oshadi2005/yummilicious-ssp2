<div class="rounded-2xl border border-pink-200 bg-white p-6 shadow-sm">
    <h3 class="text-xl font-bold text-pink-800 mb-4">Cart Items</h3>

    @if(count($this->cartItems) === 0)
        <div class="py-8 text-center">
            <p class="text-gray-500">Your cart is empty.</p>
            <a href="{{ route('products.index') }}"
               class="mt-4 inline-flex items-center gap-2 rounded-xl bg-pink-600 px-5 py-2 text-white font-semibold hover:bg-pink-700 transition">
                Browse Products →
            </a>
        </div>
    @else
        <div class="space-y-4">
            @foreach($this->cartItems as $item)
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 rounded-xl border border-pink-100 bg-pink-50 p-4">
                    <div class="flex items-center gap-4">
                        @if($item['product']->image)
                            <img src="{{ asset('storage/' . $item['product']->image) }}"
                                 class="h-16 w-16 rounded-lg object-cover"
                                 alt="{{ $item['product']->name }}">
                        @else
                            <div class="h-16 w-16 rounded-lg bg-pink-200 flex items-center justify-center text-pink-800 text-xs font-semibold">
                                No img
                            </div>
                        @endif

                        <div>
                            <p class="font-bold text-gray-900">{{ $item['product']->name }}</p>
                            <p class="text-sm text-gray-600">
                                Rs {{ number_format($item['product']->price, 2) }}
                            </p>
                            <p class="text-sm font-semibold text-pink-800">
                                Line: Rs {{ number_format($item['line_total'], 2) }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-3 justify-between md:justify-end">
                        <div class="flex items-center gap-2">
                            <label class="text-sm text-gray-600">Qty</label>
                            <input type="number"
                                   min="1"
                                   value="{{ $item['quantity'] }}"
                                   wire:change="updateQuantity({{ $item['product']->id }}, $event.target.value)"
                                   class="w-20 rounded-lg border border-pink-200 px-3 py-2 focus:ring-pink-400 focus:border-pink-400">
                        </div>

                        <button type="button"
                                wire:click="removeFromCart({{ $item['product']->id }})"
                                class="rounded-xl bg-red-500 px-4 py-2 text-white font-semibold hover:bg-red-600 transition">
                            Remove
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6 flex items-center justify-between border-t border-pink-100 pt-4">
            <p class="text-lg font-bold text-pink-900">Total</p>
            <p class="text-lg font-extrabold text-pink-900">
                Rs {{ number_format($this->cartTotal, 2) }}
            </p>
        </div>
    @endif
</div>
