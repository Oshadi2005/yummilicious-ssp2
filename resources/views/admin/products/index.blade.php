<x-app-layout>
    <main class="max-w-6xl mx-auto p-6">

        <!-- Page Title -->
        <section class="bg-pink-200 text-center py-6 rounded-lg mb-6">
            <h2 class="text-3xl font-bold text-gray-800">Order Online</h2>
        </section>

        <!-- Feedback Message -->
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        <!-- Products grouped by category -->
        @php
            $categories = $products->groupBy('category');
        @endphp

        @foreach($categories as $category => $items)
            <section class="bg-white p-6 rounded-xl shadow-md mb-10">
                <h3 class="text-xl font-bold text-center text-pink-600 mb-6">{{ $category }}</h3>
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-6">
                    @foreach($items as $product)
                        <div class="text-center border p-3 rounded-lg shadow-sm hover:shadow-md transition">
                            @if($product->image && Storage::disk('public')->exists($product->image))
                                <img src="{{ asset('storage/' . $product->image) }}" 
                                     alt="{{ $product->name }}" 
                                     class="rounded-lg shadow-md h-40 w-full object-cover mb-3">
                            @else
                                <div class="w-full h-40 bg-gray-200 flex items-center justify-center mb-3 text-sm text-gray-500">
                                    No Image
                                </div>
                            @endif
                            <p class="mt-2 font-semibold">{{ $product->name }}</p>
                            <p class="text-pink-600 font-bold mb-2">LKR {{ number_format($product->price, 2) }}</p>

                            <form action="{{ route('cart.add') }}" method="POST" class="flex flex-col items-center gap-2">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <div class="flex items-center space-x-2">
                                    <label for="qty_{{ $product->id }}" class="text-sm text-gray-600">Qty:</label>
                                    <input type="number" id="qty_{{ $product->id }}" name="quantity" value="1" min="1" 
                                           class="w-16 px-2 py-1 border rounded text-center">
                                </div>
                                <button type="submit" class="bg-pink-500 text-white px-3 py-1 rounded-lg hover:bg-pink-600 transition">
                                    Add to Cart
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>
            </section>
        @endforeach

    </main>
</x-app-layout>
