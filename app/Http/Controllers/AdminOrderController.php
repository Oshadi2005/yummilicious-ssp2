<?php

namespace App\Http\Controllers;

use App\Models\Order;

class AdminOrderController extends Controller
{
    public function index()
    {
        return view('admin.orders.index', [
            'orders' => Order::latest()->get()
        ]);
    }
}
