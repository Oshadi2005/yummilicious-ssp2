<x-app-layout>
    <div class="max-w-3xl mx-auto px-6 py-14">
        <div class="bg-white rounded-3xl border border-pink-100 shadow-xl p-8 text-center">
            <div class="text-5xl">🎉</div>
            <h1 class="mt-4 text-3xl font-extrabold text-pink-800">Order Placed!</h1>
            <p class="mt-2 text-gray-600">Thank you for ordering from Yummilicious.</p>

            @if($order)
                <p class="mt-4 font-bold text-gray-800">
                    Reference: <span class="text-pink-700">{{ $order['ref'] ?? '-' }}</span>
                </p>
                <p class="mt-2 text-gray-600 text-sm">
                    We will contact you soon to confirm delivery.
                </p>
            @endif

            <div class="mt-8 flex flex-col sm:flex-row gap-3 justify-center">
                <a href="{{ route('products.index') }}"
                   class="px-7 py-3 rounded-2xl bg-pink-500 text-white font-extrabold hover:bg-pink-600 transition">
                    Shop More
                </a>
                <a href="{{ url('/') }}"
                   class="px-7 py-3 rounded-2xl border border-pink-200 text-pink-700 font-extrabold hover:bg-pink-50 transition">
                    Back Home
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
