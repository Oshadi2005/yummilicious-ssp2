<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Lora:ital,wght@0,400;0,500;1,400&display=swap');
        .font-serif-elegant { font-family: 'Playfair Display', serif; }
        .font-body-elegant { font-family: 'Lora', serif; }
    </style>

    <section class="bg-[#FDFBF7] py-20 border-b border-rose-50 text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h1 class="text-4xl md:text-6xl font-serif-elegant font-bold text-gray-900 mb-6 flex flex-col items-center leading-snug">
                Connect With Us
            </h1>
            <p class="font-body-elegant text-gray-500 text-lg leading-loose max-w-2xl mx-auto">
                We'd love to hear from you. Get in touch for custom orders, delicate questions, or sweet feedback.
            </p>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-6 grid md:grid-cols-2 gap-10">
            <div class="bg-[#FAFAFA] py-16 px-8 border border-gray-100 flex flex-col justify-center items-center text-center hover:bg-[#FDFBF7] transition-colors duration-500">
                <span class="text-rose-300 text-3xl mb-6 flex justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                </span>
                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 mb-2 block">Direct Inquiry</span>
                <h3 class="font-serif-elegant text-2xl text-gray-900 mb-5">Email</h3>
                <a href="mailto:hello@yummilicious.local" class="font-body-elegant text-rose-500 hover:text-gray-900 border-b border-transparent hover:border-gray-900 transition-colors">hello@yummilicious.local</a>
            </div>

            <div class="bg-[#FAFAFA] py-16 px-8 border border-gray-100 flex flex-col justify-center items-center text-center hover:bg-[#FDFBF7] transition-colors duration-500">
                <span class="text-rose-300 text-3xl mb-6 flex justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                </span>
                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 mb-2 block">Speak to Artisan</span>
                <h3 class="font-serif-elegant text-2xl text-gray-900 mb-5">Phone</h3>
                <a href="tel:+1234567890" class="font-body-elegant text-rose-500 hover:text-gray-900 border-b border-transparent hover:border-gray-900 transition-colors">(123) 456-7890</a>
            </div>

            <div class="md:col-span-2 bg-[#FAFAFA] py-16 px-8 border border-gray-100 flex flex-col justify-center items-center text-center hover:bg-[#FDFBF7] transition-colors duration-500">
                <span class="text-rose-300 text-3xl mb-6 flex justify-center">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                </span>
                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-gray-400 mb-2 block">Visit Us</span>
                <h3 class="font-serif-elegant text-2xl text-gray-900 mb-5">Patisserie Address</h3>
                <p class="font-body-elegant text-gray-600">123 Bakery Lane, Sweet Town</p>
            </div>
        </div>
        
        <p class="text-center font-body-elegant text-gray-400 mt-16 max-w-xl mx-auto italic border-t border-gray-100 pt-10">
            * For grand celebrations or bespoke event orders, we kindly request consultations be booked at least 48 hours in advance.
        </p>
    </section>
</x-app-layout>
