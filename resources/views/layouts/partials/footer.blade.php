{{-- Yummilicious footer: pink background, contact details, icons --}}
<footer class="mt-auto border-t border-pink-200 bg-pink-100/80 shadow-inner">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center">
            <div>
                <h3 class="text-lg font-semibold text-pink-800 mb-2">{{ config('app.name') }}</h3>
                <p class="text-sm text-gray-600">Fresh cakes, brownies, cookies & gourmet desserts made with love.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-pink-800 mb-2">Quick Links</h3>
                <ul class="space-y-1 text-sm">
                    <li><a href="{{ route('home') }}" class="text-gray-600 hover:text-pink-600">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="text-gray-600 hover:text-pink-600">Order Online</a></li>
                    <li><a href="{{ route('about') }}" class="text-gray-600 hover:text-pink-600">About Us</a></li>
                    <li><a href="{{ route('testimonials') }}" class="text-gray-600 hover:text-pink-600">Testimonials</a></li>
                    <li><a href="{{ route('contact') }}" class="text-gray-600 hover:text-pink-600">Contact Us</a></li>
                </ul>
            </div>
            <div class="space-y-2">
                <h3 class="text-lg font-semibold text-pink-800 mb-2">Contact</h3>
                <p class="text-sm text-gray-700 flex items-center gap-2">
                    <span class="text-pink-600" aria-hidden="true">📍</span>
                    27, De Alwis Place, Dehiwala
                </p>
                <p class="text-sm text-gray-700 flex items-center gap-2">
                    <span class="text-pink-600" aria-hidden="true">📞</span>
                    <a href="tel:0762560705" class="hover:text-pink-600">076 256 0705</a>
                </p>
                <p class="text-sm text-gray-700 flex items-center gap-2">
                    <span class="text-pink-600" aria-hidden="true">📧</span>
                    <a href="mailto:Yummilicious@gmail.com" class="hover:text-pink-600">Yummilicious@gmail.com</a>
                </p>
            </div>
        </div>
        <div class="mt-8 pt-6 border-t border-pink-200 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} {{ config('app.name') }}. SSP2 Assignment.
        </div>
    </div>
</footer>
