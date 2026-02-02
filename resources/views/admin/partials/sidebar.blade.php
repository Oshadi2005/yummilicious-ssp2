<nav class="w-64 bg-pink-100 min-h-screen fixed">
    <ul class="p-6 space-y-4 font-semibold">
        <li><a href="{{ route('admin.dashboard') }}">📊 Dashboard</a></li>
        <li><a href="{{ route('admin.products.index') }}">🍰 Products</a></li>
        <li><a href="{{ route('admin.orders.index') }}">🛒 Orders</a></li>
        <li><a href="{{ route('admin.customers.index') }}">👥 Customers</a></li>
    </ul>
</nav>
