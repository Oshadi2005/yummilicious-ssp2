<x-app-layout>
    <div class="max-w-6xl mx-auto px-6 py-12">
        <h1 class="text-3xl font-extrabold text-pink-800">Checkout</h1>
        <p class="text-gray-600 mt-2">Confirm your details and place your order.</p>

        @if(session('error'))
            <div class="mt-4 p-4 rounded-xl bg-red-50 border border-red-200 text-red-700">
                {{ session('error') }}
            </div>
        @endif

        <div class="mt-8 grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- LEFT: Form --}}
            <div class="lg:col-span-2 bg-white rounded-3xl border border-pink-100 shadow-lg p-6 md:p-8">
                <form method="POST" action="{{ route('checkout.place') }}" class="space-y-5">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm font-semibold text-gray-700">Full Name</label>
                            <input name="name" value="{{ old('name') }}"
                                   class="mt-1 w-full rounded-xl border border-pink-200 focus:border-pink-400 focus:ring-pink-300"
                                   placeholder="Your name">
                            @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="text-sm font-semibold text-gray-700">Phone</label>
                            <input name="phone" value="{{ old('phone') }}"
                                   class="mt-1 w-full rounded-xl border border-pink-200 focus:border-pink-400 focus:ring-pink-300"
                                   placeholder="07X XXX XXXX">
                            @error('phone') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Delivery Address</label>
                        <input name="address" value="{{ old('address') }}"
                               class="mt-1 w-full rounded-xl border border-pink-200 focus:border-pink-400 focus:ring-pink-300"
                               placeholder="House no, street, city">
                        @error('address') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Order Notes (optional)</label>
                        <input name="notes" value="{{ old('notes') }}"
                               class="mt-1 w-full rounded-xl border border-pink-200 focus:border-pink-400 focus:ring-pink-300"
                               placeholder="E.g., less sugar, message on cake, delivery time">
                        @error('notes') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="text-sm font-semibold text-gray-700">Payment Method</label>
                        <div class="mt-2 grid sm:grid-cols-2 gap-3">
                            <label class="flex items-center gap-3 p-4 rounded-2xl border border-pink-200 cursor-pointer hover:bg-pink-50">
                                <input type="radio" name="payment_method" value="cod" checked class="text-pink-600">
                                <div>
                                    <p class="font-bold text-gray-800">Cash on Delivery</p>
                                    <p class="text-sm text-gray-600">Pay when you receive</p>
                                </div>
                            </label>

                            <label class="flex items-center gap-3 p-4 rounded-2xl border border-pink-200 cursor-pointer hover:bg-pink-50">
                                <input type="radio" name="payment_method" value="bank_transfer" class="text-pink-600">
                                <div>
                                    <p class="font-bold text-gray-800">Bank Transfer</p>
                                    <p class="text-sm text-gray-600">Send slip later</p>
                                </div>
                            </label>
                        </div>
                        @error('payment_method') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
                    </div>

                    <button class="w-full mt-4 py-4 rounded-2xl bg-gradient-to-r from-pink-500 to-rose-500 text-white font-extrabold shadow-lg shadow-pink-500/20 hover:opacity-95 transition">
                        Place Order ✅
                    </button>
                </form>
            </div>

            {{-- RIGHT: Summary --}}
            <div class="bg-white rounded-3xl border border-pink-100 shadow-lg p-6 md:p-8 h-fit">
                <h2 class="text-xl font-extrabold text-gray-800">Order Summary</h2>

                <div class="mt-4 space-y-3">
                    @forelse($cart as $item)
                        <div class="flex justify-between gap-3">
                            <div>
                                <p class="font-semibold text-gray-800">{{ $item['name'] ?? 'Item' }}</p>
                                <p class="text-sm text-gray-600">Qty: {{ $item['qty'] ?? 1 }}</p>
                            </div>
                            <p class="font-bold text-pink-700">
                                LKR {{ number_format(($item['price'] ?? 0) * ($item['qty'] ?? 1), 2) }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-600">Your cart is empty.</p>
                    @endforelse
                </div>

                <div class="mt-6 border-t pt-4 space-y-2">
                    <div class="flex justify-between text-gray-700">
                        <span>Subtotal</span>
                        <span class="font-semibold">LKR {{ number_format($subtotal, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-700">
                        <span>Delivery</span>
                        <span class="font-semibold">LKR {{ number_format($delivery, 2) }}</span>
                    </div>
                    <div class="flex justify-between text-gray-900 text-lg">
                        <span class="font-extrabold">Total</span>
                        <span class="font-extrabold">LKR {{ number_format($total, 2) }}</span>
                    </div>
                </div>

                <a href="{{ route('products.index') }}"
                   class="mt-5 inline-flex w-full justify-center py-3 rounded-2xl border border-pink-200 text-pink-700 font-bold hover:bg-pink-50 transition">
                    Continue Shopping
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
