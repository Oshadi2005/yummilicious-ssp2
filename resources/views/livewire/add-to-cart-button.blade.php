<div class="flex flex-col items-center space-y-2 w-full">
    <div class="flex items-center space-x-2">
        <input type="number"
               min="1"
               max="{{ $available }}"
               wire:model="quantity"
               class="w-16 px-2 py-1 border rounded text-center"
               @if($available === 0) disabled @endif
        />
    </div>

    <button wire:click="addToCart"
            class="bg-pink-500 text-white px-4 py-2 rounded-lg hover:bg-pink-600 transition w-full disabled:opacity-50"
            @if($available === 0) disabled @endif>
        @if($available === 0)
            Out of Stock
        @else
            Add to Cart
        @endif
    </button>
</div>
