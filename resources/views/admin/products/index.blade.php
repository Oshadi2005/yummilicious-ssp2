@extends('layouts.admin')

@section('content')
    <div class="flex items-center justify-between mb-6">
        <h2 class="text-3xl font-extrabold text-pink-600">🍰 Products</h2>

        <a href="{{ route('admin.products.create') }}"
           class="px-4 py-2 rounded-lg bg-pink-500 text-white font-semibold hover:bg-pink-600">
            + Add Product
        </a>
    </div>

    @if(session('success'))
        <div class="mb-6 rounded-lg border border-green-200 bg-green-50 p-4 text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow border border-pink-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-pink-100 text-pink-900">
                <tr>
                    <th class="p-4 text-left">Image</th>
                    <th class="p-4 text-left">Name</th>
                    <th class="p-4 text-left">Category</th>
                    <th class="p-4 text-left">Price</th>
                    <th class="p-4 text-left">Quantity</th>
                    <th class="p-4 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($products as $product)
                    <tr class="border-t">
                        <td class="p-4">
                            @if($product->image && Storage::disk('public')->exists($product->image))
                                <img src="{{ asset('storage/'.$product->image) }}"
                                     class="h-12 w-12 rounded-lg object-cover" />
                            @else
                                <div class="h-12 w-12 rounded-lg bg-gray-100 flex items-center justify-center text-xs text-gray-500">No</div>
                            @endif
                        </td>
                        <td class="p-4 font-semibold">{{ $product->name }}</td>
                        <td class="p-4">{{ $product->category }}</td>
                        <td class="p-4 font-bold text-pink-700">LKR {{ number_format($product->price, 2) }}</td>
                        <td class="p-4">{{ $product->quantity }}</td>
                        <td class="p-4 flex gap-2">
                            <a href="{{ route('admin.products.edit', $product) }}"
                               class="px-3 py-1 rounded-lg bg-pink-100 text-pink-800 font-semibold hover:bg-pink-200">
                                Edit
                            </a>

                            <form action="{{ route('admin.products.destroy', $product) }}" method="POST"
                                  onsubmit="return confirm('Delete this product?')">
                                @csrf
                                @method('DELETE')
                                <button class="px-3 py-1 rounded-lg bg-red-100 text-red-700 font-semibold hover:bg-red-200">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="p-8 text-center text-gray-500">No products found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
