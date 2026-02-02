<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

/**
 * PageController handles static pages: About Us, Testimonials, Contact Us.
 * All use the master layout and pink-themed bakery design.
 */
class PageController extends Controller
{
    /**
     * About Us page.
     */
    public function about(): View
    {
        return view('pages.about');
    }

    /**
     * Testimonials page.
     */
    public function testimonials(): View
    {
        return view('pages.testimonials');
    }

    /**
     * Contact Us page.
     */
    public function contact(): View
    {
        return view('pages.contact');
    }
}
