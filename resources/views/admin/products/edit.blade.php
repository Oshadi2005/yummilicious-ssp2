<x-app-layout>
    <div class="p-10 max-w-xl mx-auto">
        <h1 class="text-3xl font-bold text-pink-600 mb-6">✏️ Edit Product</h1>

        <form method="POST" action="{{ route('admin.products.update', $product) }}">
            @csrf
            @method('PUT')

            <input name="name" value="{{ $product->name }}"
                   class="w-full mb-4 p-2 border rounded">

            <input name="price" value="{{ $product->price }}"
                   class="w-full mb-4 p-2 border rounded">

            <input name="stock" value="{{ $product->stock }}"
                   class="w-full mb-4 p-2 border rounded">

            <button class="bg-pink-500 text-white px-4 py-2 rounded">
                Update
            </button>
        </form>
    </div>
</x-app-layout>
