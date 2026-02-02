<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class AddToCartButton extends Component
{
    public int $productId;
    public int $stock = 0;
    public int $quantity = 1;

    protected const CART_SESSION_KEY = 'yummilicious_cart';

    // Add product to session cart
    public function addToCart()
    {
        $product = Product::find($this->productId);

        if (!$product || $this->quantity < 1) {
            return;
        }

        // Get current cart from session
        $cart = session()->get(self::CART_SESSION_KEY, []);

        $currentQty = $cart[$this->productId] ?? 0;
        $cart[$this->productId] = min($currentQty + $this->quantity, $product->stock);

        session()->put(self::CART_SESSION_KEY, $cart);

        // Dispatch event to update navbar or other components
        $this->dispatch('cartUpdated');

        // Reset quantity to 1 after adding
        $this->quantity = 1;
    }

    public function render()
    {
        return view('livewire.add-to-cart-button');
    }
}
