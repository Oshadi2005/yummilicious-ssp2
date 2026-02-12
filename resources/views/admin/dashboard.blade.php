@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl font-extrabold text-pink-600 mb-6">📊 Dashboard</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-2xl shadow p-6 border border-pink-100">
            <p class="text-sm text-gray-500">Total Orders</p>
            <p class="text-3xl font-bold text-pink-700">{{ $totalOrders }}</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border border-pink-100">
            <p class="text-sm text-gray-500">Total Sales</p>
            <p class="text-3xl font-bold text-pink-700">LKR {{ number_format($totalSales, 2) }}</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border border-pink-100">
            <p class="text-sm text-gray-500">Low Stock (<= 5)</p>
            <p class="text-3xl font-bold text-pink-700">{{ $lowStock }}</p>
        </div>

        <div class="bg-white rounded-2xl shadow p-6 border border-pink-100">
            <p class="text-sm text-gray-500">Top Product</p>
            <p class="text-2xl font-bold text-pink-700">{{ $topProduct }}</p>
        </div>
    </div>
@endsection
