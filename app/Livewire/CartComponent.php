<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\On;
use Livewire\Component;

/**
 * CartComponent handles Add to Cart functionality without page refresh.
 * Cart is stored in session; count updates instantly via Livewire.
 */
class CartComponent extends Component
{
    /** Session key for cart items [product_id => quantity] */
    protected const CART_SESSION_KEY = 'yummilicious_cart';

    /** Force re-render when cart is updated from another component (e.g. AddToCartButton). */
    public int $refreshKey = 0;

    #[On('cartUpdated')]
    public function refreshCart(): void
    {
        $this->refreshKey++;
    }

    /**
     * Add a product to the cart (or increase quantity).
     */
    public function addToCart(int $productId, int $quantity = 1): void
    {
        $product = Product::find($productId);
        if (! $product || $quantity < 1) {
            return;
        }

        $cart = session()->get(self::CART_SESSION_KEY, []);
        $current = ($cart[$productId] ?? 0) + $quantity;
        $max = max(0, (int) $product->stock);
        $cart[$productId] = $max > 0 ? min($current, $max) : $current;
        if ($cart[$productId] <= 0) {
            unset($cart[$productId]);
        }
        session()->put(self::CART_SESSION_KEY, $cart);
    }

    /**
     * Remove a product from the cart.
     */
    public function removeFromCart(int $productId): void
    {
        $cart = session()->get(self::CART_SESSION_KEY, []);
        unset($cart[$productId]);
        session()->put(self::CART_SESSION_KEY, $cart);
    }

    /**
     * Update quantity for a product in the cart.
     */
    public function updateQuantity(int $productId, int $quantity): void
    {
        if ($quantity < 1) {
            $this->removeFromCart($productId);
            return;
        }

        $product = Product::find($productId);
        if (! $product) {
            return;
        }

        $cart = session()->get(self::CART_SESSION_KEY, []);
        $max = max(0, (int) $product->stock);
        $cart[$productId] = min($quantity, $max);
        if ($cart[$productId] <= 0) {
            unset($cart[$productId]);
        }
        session()->put(self::CART_SESSION_KEY, $cart);
    }

    /**
     * Get cart items with product details for display.
     *
     * @return array<int, array{product: Product, quantity: int, line_total: float}>
     */
    public function getCartItemsProperty(): array
    {
        $cart = session()->get(self::CART_SESSION_KEY, []);
        if (empty($cart)) {
            return [];
        }

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

    /**
     * Total number of items in the cart.
     */
    public function getCartCountProperty(): int
    {
        $cart = session()->get(self::CART_SESSION_KEY, []);
        return (int) array_sum($cart);
    }

    /**
     * Total price of the cart.
     */
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
        return view('livewire.cart-component');
    }
}
