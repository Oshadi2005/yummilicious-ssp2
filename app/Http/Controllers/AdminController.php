<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard', [
            'totalOrders' => Order::count(),
            'totalSales'  => Order::sum('total'),
            'lowStock'    => Product::where('stock', '<=', 5)->count(),
            'topProduct'  => Product::orderBy('sold', 'desc')->value('name') ?? 'N/A'
        ]);
    }
}

