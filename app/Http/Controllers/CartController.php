<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);

        // normalize to something blade can easily use
        $cartItems = collect($cart)->map(function ($item) {
            $name = $item['name'] ?? ($item['product']->name ?? 'Item');
            $price = (float) ($item['price'] ?? ($item['product']->price ?? 0));
            $qty = (int) ($item['qty'] ?? ($item['quantity'] ?? 1));

            return (object) [
                'name' => $name,
                'price' => $price,
                'quantity' => $qty,
                'line_total' => $price * $qty,
                'product' => $item['product'] ?? null,
            ];
        });

        $total = $cartItems->sum('line_total');

        return view('cart.index', compact('cartItems', 'total'));
    }
}
