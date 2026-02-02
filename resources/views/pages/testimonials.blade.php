<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">
            {{ __('Testimonials') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <p class="text-gray-600 mb-8 text-center">What our customers say about us.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Testimonial 1 --}}
                <div class="bg-white rounded-2xl shadow-lg border border-pink-100 p-6 hover:shadow-xl transition-shadow">
                    <p class="text-gray-600 italic mb-4">"The chocolate cake is incredible. Always fresh and the staff is so friendly!"</p>
                    <p class="font-semibold text-pink-700">— Sarah M.</p>
                </div>
                {{-- Testimonial 2 --}}
                <div class="bg-white rounded-2xl shadow-lg border border-pink-100 p-6 hover:shadow-xl transition-shadow">
                    <p class="text-gray-600 italic mb-4">"We order cookies for every office party. Everyone loves them."</p>
                    <p class="font-semibold text-pink-700">— James K.</p>
                </div>
                {{-- Testimonial 3 --}}
                <div class="bg-white rounded-2xl shadow-lg border border-pink-100 p-6 hover:shadow-xl transition-shadow">
                    <p class="text-gray-600 italic mb-4">"Best pastries in town. The croissants are perfect with coffee."</p>
                    <p class="font-semibold text-pink-700">— Emma L.</p>
                </div>
                {{-- Testimonial 4 --}}
                <div class="bg-white rounded-2xl shadow-lg border border-pink-100 p-6 hover:shadow-xl transition-shadow">
                    <p class="text-gray-600 italic mb-4">"Yummilicious made our wedding cake. Beautiful and delicious."</p>
                    <p class="font-semibold text-pink-700">— Rachel & Tom</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
