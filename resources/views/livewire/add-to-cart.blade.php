<div class="flex flex-col items-center">
    <div class="flex items-center space-x-2 mb-2">
        <input type="number" wire:model="quantity" min="1" class="w-16 px-2 py-1 border rounded text-center">
    </div>
    <button wire:click="addToCart"
            class="bg-pink-500 text-white px-3 py-1 rounded-lg hover:bg-pink-600 transition">
        Add to Cart
    </button>

    @if (session()->has('success'))
        <p class="text-green-600 mt-2 text-sm">{{ session('success') }}</p>
    @endif
</div>
