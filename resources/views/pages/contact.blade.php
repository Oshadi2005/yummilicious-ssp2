<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-pink-800 leading-tight">
            {{ __('Contact Us') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white/90 rounded-2xl shadow-lg border border-pink-100 p-6 md:p-10">
                <p class="text-gray-600 mb-6">We'd love to hear from you. Get in touch for orders, questions, or feedback.</p>
                <div class="space-y-4">
                    <div class="flex items-start gap-3 p-3 bg-pink-50 rounded-lg">
                        <span class="text-pink-500 font-bold">Email</span>
                        <a href="mailto:hello@yummilicious.local" class="text-gray-700 hover:text-pink-600">hello@yummilicious.local</a>
                    </div>
                    <div class="flex items-start gap-3 p-3 bg-pink-50 rounded-lg">
                        <span class="text-pink-500 font-bold">Phone</span>
                        <a href="tel:+1234567890" class="text-gray-700 hover:text-pink-600">(123) 456-7890</a>
                    </div>
                    <div class="flex items-start gap-3 p-3 bg-pink-50 rounded-lg">
                        <span class="text-pink-500 font-bold">Address</span>
                        <span class="text-gray-700">123 Bakery Lane, Sweet Town</span>
                    </div>
                </div>
                <p class="mt-6 text-sm text-gray-500">For large orders or events, please contact us at least 48 hours in advance.</p>
            </div>
        </div>
    </div>
</x-app-layout>
