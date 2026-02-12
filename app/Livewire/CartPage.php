<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

class CartPage extends Component
{
    protected const CART_SESSION_KEY = 'yummilicious_cart';

    public int $refreshKey = 0;

    #[On('cartUpdated')]
    public function refreshCart(): void
    {
        $this->refreshKey++;
    }

    public function removeFromCart(int $productId): void
    {
        $cart = session()->get(self::CART_SESSION_KEY, []);
        unset($cart[$productId]);
        session()->put(self::CART_SESSION_KEY, $cart);

        $this->dispatch('cartUpdated');
    }

    public function updateQuantity(int $productId, int $quantity): void
    {
        if ($quantity < 1) {
            $this->removeFromCart($productId);
            return;
        }

        $product = Product::find($productId);
        if (! $product) return;

        $cart = session()->get(self::CART_SESSION_KEY, []);
        $max = max(0, (int) $product->stock);

        $cart[$productId] = $max > 0 ? min($quantity, $max) : $quantity;

        session()->put(self::CART_SESSION_KEY, $cart);

        $this->dispatch('cartUpdated');
    }

    public function getCartItemsProperty(): array
    {
        $cart = session()->get(self::CART_SESSION_KEY, []);
        if (empty($cart)) return [];

        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');

        $items = [];
        foreach ($cart as $id => $qty) {
            $product = $products->get($id);
            if ($product && $qty > 0) {
                $items[] = [
                    'product' => $product,
                    'quantity' => (int) $qty,
                    'line_total' => (float) ($product->price * $qty),
                ];
            }
        }
        return $items;
    }

    public function getCartTotalProperty(): float
    {
        $total = 0.0;
        foreach ($this->cartItems as $item) {
            $total += $item['line_total'];
        }
        return round($total, 2);
    }

    public function render(): View
    {
        return view('livewire.cart-page');
    }
}
