<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminCustomerController extends Controller
{
    public function index()
    {
        return view('admin.customers.index', [
            'customers' => User::where('role', 'customer')->latest()->get()
        ]);
    }
}
