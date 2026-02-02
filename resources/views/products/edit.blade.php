<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">
            {{ __('Edit Product') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 rounded-2xl shadow-lg border border-pink-100 p-6 md:p-8">
                <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $product->name) }}" required
                            class="mt-1 block w-full rounded-lg border-pink-200 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm @error('name') border-red-500 @enderror">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" id="description" rows="3" class="mt-1 block w-full rounded-lg border-pink-200 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm @error('description') border-red-500 @enderror">{{ old('description', $product->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="price" class="block text-sm font-medium text-gray-700">Price</label>
                        <input type="number" name="price" id="price" value="{{ old('price', $product->price) }}" step="0.01" min="0" required
                            class="mt-1 block w-full rounded-lg border-pink-200 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm @error('price') border-red-500 @enderror">
                        @error('price')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="category" class="block text-sm font-medium text-gray-700">Category</label>
                        <select name="category" id="category" required class="mt-1 block w-full rounded-lg border-pink-200 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm @error('category') border-red-500 @enderror">
                            <option value="cakes" {{ old('category', $product->category) === 'cakes' ? 'selected' : '' }}>Cakes</option>
                            <option value="cookies" {{ old('category', $product->category) === 'cookies' ? 'selected' : '' }}>Cookies</option>
                            <option value="pastries" {{ old('category', $product->category) === 'pastries' ? 'selected' : '' }}>Pastries</option>
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label for="stock" class="block text-sm font-medium text-gray-700">Stock</label>
                        <input type="number" name="stock" id="stock" value="{{ old('stock', $product->stock) }}" min="0" required
                            class="mt-1 block w-full rounded-lg border-pink-200 shadow-sm focus:border-pink-500 focus:ring-pink-500 sm:text-sm @error('stock') border-red-500 @enderror">
                        @error('stock')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="image" class="block text-sm font-medium text-gray-700">Image (optional)</label>
                        @if($product->image)
                            <div class="mt-1 mb-2">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="h-24 w-auto rounded-lg border border-pink-100">
                                <p class="text-xs text-gray-500 mt-1">Current image. Upload a new file to replace.</p>
                            </div>
                        @endif
                        <input type="file" name="image" id="image" accept="image/*"
                            class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-pink-50 file:text-pink-700 hover:file:bg-pink-100">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex gap-4">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-pink-500 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-offset-2 transition">
                            Update Product
                        </button>
                        <a href="{{ route('products.index') }}" class="inline-flex items-center px-4 py-2 bg-white border border-pink-200 rounded-lg font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-pink-50 focus:outline-none focus:ring-2 focus:ring-pink-400 focus:ring-offset-2 transition">
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
