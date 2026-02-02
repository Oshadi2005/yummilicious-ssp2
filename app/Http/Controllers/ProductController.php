<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display all products for customers (Order Online page).
     * Products are fetched with latest first and passed to Blade.
     */
    public function index()
    {
        // Fetch all products ordered by creation date descending
        $products = Product::latest()->get();

        // Pass products to the Blade view
        return view('products.index', compact('products'));
    }
}
