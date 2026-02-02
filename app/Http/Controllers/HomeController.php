<?php

namespace App\Http\Controllers;

use App\Models\Product;

/**
 * HomeController serves the homepage with welcome message and featured products.
 */
class HomeController extends Controller
{
    /**
     * Display the homepage with featured products (e.g. first 6).
     */
    public function index()
    {
        $featuredProducts = Product::orderBy('created_at', 'desc')->take(6)->get();

        return view('home', compact('featuredProducts'));
    }
}
