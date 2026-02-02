<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{
    public $productId;
    public $quantity = 1;

    public function addToCart()
    {
        $user = Auth::user();
        if (! $user) return;

        $product = Product::find($this->productId);
        if (! $product) return;

        // Update or create cart row
        Cart::updateOrCreate(
            ['user_id' => $user->id, 'product_id' => $this->productId],
            ['quantity' => $this->quantity]
        );

        // Notify other components (like cart count in navbar)
        $this->emit('cartUpdated');
        session()->flash('success', 'Product added to cart!');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
