<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Lora:ital,wght@0,400;0,500;1,400&display=swap');
        .font-serif-elegant { font-family: 'Playfair Display', serif; }
        .font-body-elegant { font-family: 'Lora', serif; }
    </style>

    {{-- HEADER --}}
    <section class="bg-[#FDFBF7] py-20 border-b border-rose-50 text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h1 class="text-4xl md:text-6xl font-serif-elegant font-bold text-gray-900 mb-6 flex flex-col items-center leading-snug">
                Our Story
            </h1>
            <p class="font-body-elegant text-gray-500 text-lg leading-loose max-w-2xl mx-auto">
                Crafting fresh cakes, cookies, and pastries with love, dedication, and the finest ingredients since day one.
            </p>
        </div>
    </section>

    {{-- CONTENT --}}
    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
            <div class="relative">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcRgHEYx9cEQOE1-ECdJczcXTrya-uV8at7Q&s" alt="Baking process" class="w-full h-auto object-cover shadow-sm border border-gray-100" />
                <div class="absolute -bottom-8 -right-8 w-2/3 hidden md:block border-[10px] border-white shadow-xl bg-white">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7fnC1vS9i0uj1Q97EWHUHnvT6vuRPBUetag&s" alt="Finished cake" class="w-full h-full object-cover" />
                </div>
            </div>
            <div class="md:pl-10 relative z-10 bg-white/50 backdrop-blur-sm p-4 sm:p-0">
                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-rose-500 mb-3 block">The Beginning</span>
                <h2 class="font-serif-elegant text-3xl md:text-4xl text-gray-900 mb-6">A passion for perfection</h2>
                <div class="font-body-elegant text-gray-500 text-base leading-relaxed space-y-6">
                    <p>Yummilicious is your neighborhood artisan patisserie. Founded with a profound passion for baking, we focus on uncompromising quality, creativity, and impeccable service.</p>
                    <p>Whether you're celebrating a milestone birthday, organizing a grand wedding, or treating yourself to an afternoon delight, we believe every bite should feel exceptionally special.</p>
                </div>

                <div class="mt-12">
                    <h3 class="font-serif-elegant text-2xl text-gray-900 mb-6 border-b border-gray-100 pb-4">Our Values</h3>
                    <ul class="space-y-4 font-body-elegant text-gray-600">
                        <li class="flex items-start">
                            <span class="text-rose-400 mr-3">✧</span> Freshly sourced ingredients, daily baking
                        </li>
                        <li class="flex items-start">
                            <span class="text-rose-400 mr-3">✧</span> Warm, welcoming, and personalized service
                        </li>
                        <li class="flex items-start">
                            <span class="text-rose-400 mr-3">✧</span> Unwavering consistency and luxury in every product
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
