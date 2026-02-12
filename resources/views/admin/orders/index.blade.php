@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl font-extrabold text-pink-600 mb-6">🛒 Orders</h2>

    <div class="bg-white rounded-2xl shadow border border-pink-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-pink-100 text-pink-900">
                <tr>
                    <th class="p-4 text-left">Order ID</th>
                    <th class="p-4 text-left">Customer</th>
                    <th class="p-4 text-left">Status</th>
                    <th class="p-4 text-left">Total</th>
                    <th class="p-4 text-left">Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr class="border-t">
                        <td class="p-4 font-semibold">#{{ $order->id }}</td>
                        <td class="p-4">{{ $order->customer_name ?? ($order->user->name ?? 'N/A') }}</td>
                        <td class="p-4">{{ $order->status ?? 'pending' }}</td>
                        <td class="p-4 font-bold text-pink-700">LKR {{ number_format($order->total ?? 0, 2) }}</td>
                        <td class="p-4">{{ optional($order->created_at)->format('Y-m-d') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-8 text-center text-gray-500">No orders found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
