@extends('layouts.admin')

@section('content')
    <div class="max-w-2xl mx-auto">

        <h2 class="text-3xl font-extrabold text-pink-600 text-center mb-8">
            ✏️ Edit Product
        </h2>

        {{-- Validation Errors --}}
        @if ($errors->any())
            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 p-4 text-red-700">
                <p class="font-semibold mb-2">Please fix these:</p>
                <ul class="list-disc ms-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.products.update', $product) }}" method="POST" enctype="multipart/form-data"
              class="bg-white rounded-2xl shadow border border-pink-100 p-6 space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Product Name</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}"
                       class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300"
                       required>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Description (optional)</label>
                <textarea name="description" rows="3"
                          class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300"
                          placeholder="Short description...">{{ old('description', $product->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
                <input type="text" name="category" value="{{ old('category', $product->category) }}"
                       class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300"
                       required>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Price (LKR)</label>
                    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}"
                           class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300"
                           required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Quantity</label>
                    <input type="number" name="quantity" value="{{ old('quantity', $product->quantity) }}"
                           min="0"
                           class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300"
                           required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-1">Current Image</label>
                @if($product->image && Storage::disk('public')->exists($product->image))
                    <img src="{{ asset('storage/'.$product->image) }}"
                         class="h-24 w-24 rounded-lg object-cover border mb-3" alt="Product image">
                @else
                    <p class="text-sm text-gray-500 mb-3">No image uploaded</p>
                @endif

                <label class="block text-sm font-semibold text-gray-700 mb-1">Change Image (optional)</label>
                <input type="file" name="image"
                       class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300">
            </div>

            <div class="pt-2 flex gap-3">
                <button type="submit"
                        class="px-6 py-2 rounded-lg bg-pink-500 text-white font-semibold hover:bg-pink-600 transition">
                    Update
                </button>

                <a href="{{ route('admin.products.index') }}"
                   class="px-6 py-2 rounded-lg bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition">
                    Cancel
                </a>
            </div>
        </form>
    </div>
@endsection
