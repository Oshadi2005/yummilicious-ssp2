<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    private const CART_SESSION_KEY = 'yummilicious_cart';

    public function index(Request $request)
    {
        $cart = session()->get(self::CART_SESSION_KEY, []); // [product_id => qty]

        // Build items with product info
        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');

        $items = [];
        $subtotal = 0;

        foreach ($cart as $id => $qty) {
            $product = $products->get($id);
            if (! $product || $qty < 1) continue;

            $line = (float) $product->price * (int) $qty;
            $subtotal += $line;

            $items[] = [
                'product' => $product,
                'qty' => (int) $qty,
                'price' => (float) $product->price,
                'line_total' => $line,
            ];
        }

        $delivery = $subtotal > 0 ? 300 : 0;
        $total = $subtotal + $delivery;

        return view('checkout', [
            'cart' => $items,
            'subtotal' => $subtotal,
            'delivery' => $delivery,
            'total' => $total,
        ]);
    }

    public function placeOrder(Request $request)
    {
        $request->validate([
            'name' => ['required','string','max:120'],
            'phone' => ['required','string','max:30'],
            'address' => ['required','string','max:255'],
            'notes' => ['nullable','string','max:255'],
            'payment_method' => ['required','in:cod,bank_transfer'],
        ]);

        $cart = session()->get(self::CART_SESSION_KEY, []);
        if (empty($cart)) {
            return back()->with('error', 'Your cart is empty.');
        }

        // Calculate total
        $products = Product::whereIn('id', array_keys($cart))->get()->keyBy('id');
        $subtotal = 0;
        foreach ($cart as $id => $qty) {
            $product = $products->get($id);
            if ($product) {
                $subtotal += (float) $product->price * (int) $qty;
            }
        }
        $delivery = $subtotal > 0 ? 300 : 0;
        $total = $subtotal + $delivery;

        // Save to Database
        $order = \App\Models\Order::create([
            'user_id' => auth()->id(),
            'total' => $total,
            'status' => 'pending',
        ]);

        // Attach products with quantity to pivot table
        foreach ($cart as $id => $qty) {
            $order->products()->attach($id, ['quantity' => $qty]);
        }

        $orderRef = 'ORD-' . str_pad($order->id, 4, '0', STR_PAD_LEFT) . '-' . now()->format('His');

        session([
            'last_order' => [
                'ref' => $orderRef,
                'customer' => $request->only(['name','phone','address','notes','payment_method']),
                'items' => $cart,
                'created_at' => now()->toDateTimeString(),
            ]
        ]);

        // Clear cart
        session()->forget(self::CART_SESSION_KEY);

        return redirect()->route('checkout.success')->with('orderRef', $orderRef);
    }

    public function success()
    {
        $order = session('last_order');
        return view('checkout-success', compact('order'));
    }
}
