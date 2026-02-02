<x-app-layout>
    <div class="flex">
        {{-- Sidebar --}}
        @include('admin.partials.sidebar')

        {{-- Main Content --}}
        <main class="flex-1 p-10 bg-pink-50 min-h-screen">
            <h2 class="text-4xl font-extrabold text-pink-600 mb-8">
                📊 Admin Dashboard
            </h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                
                <!-- Total Orders -->
                <div class="bg-gradient-to-r from-pink-400 to-pink-600 text-white rounded-2xl shadow-lg p-6 hover:scale-105 transition">
                    <div class="flex items-center space-x-4">
                        <div class="text-4xl">🛒</div>
                        <div>
                            <p class="text-sm opacity-80">Total Orders</p>
                            <p class="text-3xl font-bold">{{ $totalOrders }}</p>
                        </div>
                    </div>
                </div>

                <!-- Total Sales -->
                <div class="bg-gradient-to-r from-yellow-400 to-yellow-500 text-white rounded-2xl shadow-lg p-6 hover:scale-105 transition">
                    <div class="flex items-center space-x-4">
                        <div class="text-4xl">💰</div>
                        <div>
                            <p class="text-sm opacity-80">Total Sales</p>
                            <p class="text-3xl font-bold">
                                LKR {{ number_format($totalSales, 2) }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Low Stock -->
                <div class="bg-gradient-to-r from-red-400 to-red-600 text-white rounded-2xl shadow-lg p-6 hover:scale-105 transition">
                    <div class="flex items-center space-x-4">
                        <div class="text-4xl">⚠️</div>
                        <div>
                            <p class="text-sm opacity-80">Low Stock Items</p>
                            <p class="text-3xl font-bold">{{ $lowStock }}</p>
                        </div>
                    </div>
                </div>

                <!-- Top Product -->
                <div class="bg-gradient-to-r from-green-400 to-green-600 text-white rounded-2xl shadow-lg p-6 hover:scale-105 transition">
                    <div class="flex items-center space-x-4">
                        <div class="text-4xl">🏆</div>
                        <div>
                            <p class="text-sm opacity-80">Top Product</p>
                            <p class="text-2xl font-bold">
                                {{ $topProduct ?? 'N/A' }}
                            </p>
                        </div>
                    </div>
                </div>

            </div>
        </main>
    </div>
</x-app-layout>
