<x-app-layout>
    <main class="max-w-6xl mx-auto p-6">

        <div class="flex items-center justify-between mb-6">
            <h2 class="text-3xl font-bold text-pink-700">🛒 Your Cart</h2>

            <a href="{{ route('products.index') }}"
               class="rounded-xl border border-pink-300 bg-white px-4 py-2 font-semibold text-pink-700 hover:bg-pink-50 transition">
                ← Continue Shopping
            </a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded-xl mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded-xl mb-4">
                {{ session('error') }}
            </div>
        @endif

        {{-- ✅ FULL CART DETAILS COMPONENT --}}
        @livewire('cart-page')

        <div class="mt-6 flex justify-end">
            <a href="{{ route('checkout.index') }}"
               class="inline-flex items-center justify-center rounded-xl bg-pink-500 px-6 py-3 font-semibold text-white hover:bg-pink-600 transition">
                Proceed to Checkout →
            </a>
        </div>

    </main>
</x-app-layout>
