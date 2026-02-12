<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class AddToCartButton extends Component
{
    public int $productId;
    public int $available = 0; // ✅ renamed
    public int $quantity = 1;

    protected const CART_SESSION_KEY = 'yummilicious_cart';

    public function mount(int $productId): void
    {
        $this->productId = $productId;

        $product = Product::find($productId);
        $this->available = (int) ($product?->quantity ?? 0); // ✅ safe
    }

    public function addToCart(): void
    {
        $product = Product::find($this->productId);

        if (!$product) return;

        $available = (int) ($product->quantity ?? 0);

        if ($available <= 0) return;

        $qty = max(1, (int)$this->quantity);

        $cart = session()->get(self::CART_SESSION_KEY, []);
        $currentQty = (int) ($cart[$this->productId] ?? 0);

        $cart[$this->productId] = min($currentQty + $qty, $available);

        session()->put(self::CART_SESSION_KEY, $cart);

        $this->dispatch('cartUpdated');

        $this->quantity = 1;
        $this->available = $available;
    }

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}
