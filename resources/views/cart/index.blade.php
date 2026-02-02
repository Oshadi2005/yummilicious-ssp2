<x-app-layout>
    <main class="max-w-6xl mx-auto p-6">

        <h2 class="text-3xl font-bold text-pink-600 mb-6">🛒 Your Cart</h2>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($cartItems->isEmpty())
            <p class="text-gray-600">Your cart is empty.</p>
        @else
            <div class="space-y-4">
                @foreach($cartItems as $item)
                    <div class="flex items-center justify-between bg-white p-4 rounded shadow">
                        <div>
                            <h4 class="font-semibold">{{ $item->product->name }}</h4>
                            <p class="text-sm text-gray-500">
                                LKR {{ number_format($item->product->price, 2) }}
                            </p>
                        </div>

                        <form method="POST" action="{{ route('cart.update', $item->id) }}" class="flex items-center space-x-2">
                            @csrf
                            @method('PUT')
                            <input type="number"
                                   name="quantity"
                                   value="{{ $item->quantity }}"
                                   min="1"
                                   class="w-16 border rounded px-2 py-1">
                            <button class="bg-blue-500 text-white px-3 py-1 rounded">
                                Update
                            </button>
                        </form>

                        <form method="POST" action="{{ route('cart.remove', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="bg-red-500 text-white px-3 py-1 rounded">
                                Remove
                            </button>
                        </form>
                    </div>
                @endforeach
            </div>

            <div class="mt-6 text-right">
                <h3 class="text-xl font-bold">
                    Total: LKR {{ number_format($total, 2) }}
                </h3>
            </div>
        @endif

    </main>
</x-app-layout>
