<div class="flex flex-col items-center space-y-2 w-full">

    <!-- Quantity Input -->
    <div class="flex items-center space-x-2">
        <input type="number" min="1" max="{{ $stock }}" wire:model="quantity"
               class="w-16 px-2 py-1 border rounded text-center" />
    </div>

    <!-- Add to Cart Button -->
    <button wire:click="addToCart"
            class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition w-full"
            @if($stock === 0) disabled @endif>
        @if($stock === 0)
            Out of Stock
        @else
            Add to Cart
        @endif
    </button>

</div>
