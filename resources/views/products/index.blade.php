<x-app-layout>
    <main class="flex-1 p-10">

        <h2 class="text-4xl font-extrabold text-pink-600 mb-8">🛍️ Order Online</h2>

        @if($products->isEmpty())
            <p class="text-gray-500 text-center mt-20 text-lg">No products available at the moment. Check back later!</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($products as $product)
                    <div class="border p-4 rounded-xl shadow hover:shadow-lg transition flex flex-col items-center">

                        <!-- Product Image -->
                        @if ($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" 
                                 alt="{{ $product->name }}" 
                                 class="h-40 w-full object-cover rounded mb-3">
                        @else
                            <div class="h-40 w-full bg-gray-200 flex items-center justify-center mb-3 text-sm text-gray-500">
                                No Image
                            </div>
                        @endif

                        <!-- Product Info -->
                        <p class="font-semibold mb-1 text-center">{{ $product->name }}</p>
                        <p class="text-pink-600 font-bold mb-2 text-center">LKR {{ number_format($product->price, 2) }}</p>
                        <p class="text-gray-600 mb-2 text-sm text-center">Stock: {{ $product->stock }}</p>

                        <!-- Livewire Add to Cart Button -->
                        <livewire:add-to-cart-button 
                            :product-id="$product->id" 
                            :stock="$product->stock"
                            :wire:key="'product-'.$product->id" />

                    </div>
                @endforeach
            </div>
        @endif

    </main>
</x-app-layout>
