<x-app-layout>
    <div class="p-10 max-w-xl mx-auto">
        <h1 class="text-3xl font-bold text-pink-600 mb-6">➕ Add Product</h1>

        <form method="POST" action="{{ route('admin.products.store') }}">
            @csrf

            <input name="name" placeholder="Product Name"
                   class="w-full mb-4 p-2 border rounded">

            <input name="price" placeholder="Price"
                   class="w-full mb-4 p-2 border rounded">

            <input name="stock" placeholder="Stock"
                   class="w-full mb-4 p-2 border rounded">

            <button class="bg-pink-500 text-white px-4 py-2 rounded">
                Save
            </button>
        </form>
    </div>
</x-app-layout>
