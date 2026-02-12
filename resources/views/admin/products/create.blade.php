<x-app-layout>
    <div class="min-h-screen bg-pink-50">
        <div class="max-w-2xl mx-auto px-6 py-10">

            <h2 class="text-3xl font-extrabold text-pink-600 text-center mb-8">
                ➕ Add Product
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

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data"
                  class="bg-white rounded-2xl shadow p-6 space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Product Name</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300"
                           placeholder="Vanilla Cookies" required>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Description (optional)</label>
                    <textarea name="description"
                              class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300"
                              rows="3"
                              placeholder="Short description...">{{ old('description') }}</textarea>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
                    <input type="text" name="category" value="{{ old('category') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300"
                           placeholder="Cookies" required>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Price (LKR)</label>
                        <input type="number" step="0.01" name="price" value="{{ old('price') }}"
                               class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300"
                               placeholder="900" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Quantity</label>
                        <input type="number" name="quantity" value="{{ old('quantity', 0) }}"
                               class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300"
                               placeholder="8" min="0" required>
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Image (optional)</label>
                    <input type="file" name="image"
                           class="w-full rounded-lg border-gray-300 focus:border-pink-400 focus:ring-pink-300">
                </div>

                <div class="pt-2 flex gap-3">
                    <button type="submit"
                            class="px-6 py-2 rounded-lg bg-pink-500 text-white font-semibold hover:bg-pink-600 transition">
                        Save
                    </button>

                    <a href="{{ route('admin.products.index') }}"
                       class="px-6 py-2 rounded-lg bg-gray-100 text-gray-700 font-semibold hover:bg-gray-200 transition">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>
