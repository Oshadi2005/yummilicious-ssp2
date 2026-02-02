<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">
            {{ __('About Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 rounded-2xl shadow-lg border border-pink-100 p-6 md:p-10">
                <h1 class="text-3xl font-bold text-pink-800 mb-4">About Yummilicious</h1>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Yummilicious is your neighborhood bakery, crafting fresh cakes, cookies, and pastries with love and the finest ingredients. We believe every bite should feel special.
                </p>
                <p class="text-gray-600 leading-relaxed mb-4">
                    Founded with a passion for baking, we focus on quality, creativity, and friendly service. Whether you're celebrating a birthday, treating yourself, or picking up something for the family, we're here to make your day sweeter.
                </p>
                <div class="mt-8 p-4 bg-pink-50 rounded-lg border border-pink-100">
                    <h3 class="font-semibold text-pink-700 mb-2">Our Values</h3>
                    <ul class="list-disc list-inside text-gray-600 space-y-1">
                        <li>Fresh ingredients, daily baking</li>
                        <li>Warm, welcoming service</li>
                        <li>Consistent quality in every product</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
