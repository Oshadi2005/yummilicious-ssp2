<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Lora:ital,wght@0,400;0,500;1,400&display=swap');
        .font-serif-elegant { font-family: 'Playfair Display', serif; }
        .font-body-elegant { font-family: 'Lora', serif; }
    </style>

    <section class="bg-[#FDFBF7] py-20 border-b border-rose-50 text-center">
        <div class="max-w-4xl mx-auto px-6">
            <h1 class="text-4xl md:text-6xl font-serif-elegant font-bold text-gray-900 mb-6 flex flex-col items-center leading-snug">
                Words of Appreciation
            </h1>
            <p class="font-body-elegant text-gray-500 text-lg leading-loose max-w-2xl mx-auto">
                Cherished moments and sweet experiences shared by our beloved clientele.
            </p>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 gap-y-20">
                @foreach([
                    ['name'=>'Sarah M.','img'=>'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150&q=80','text'=>'The chocolate cake is incredible. The presentation was meticulous, always fresh, and the staff is so warm and welcoming!'],
                    ['name'=>'James K.','img'=>'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&q=80','text'=>'We order the artisan cookies for every office celebration. Everyone adores them. Simply the finest in the city.'],
                    ['name'=>'Emma L.','img'=>'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&q=80','text'=>'Best pastries in town. Their delicate croissants are arguably perfect with a morning coffee. Unmatched elegance.'],
                    ['name'=>'Rachel & Tom','img'=>'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=150&q=80','text'=>'Yummilicious curated our wedding cake, and it was an absolute masterpiece. Visually stunning and profoundly delicious.'],
                ] as $t)
                    <div class="bg-[#FAFAFA] p-12 border border-gray-100 hover:border-rose-100 transition-colors duration-500 relative mt-6 hover:shadow-sm flex flex-col h-full">
                        <div class="absolute -top-10 left-10">
                            <div class="w-16 h-16 bg-white border border-rose-100 rounded-full flex items-center justify-center shadow-sm">
                                <span class="text-rose-300 text-5xl font-serif-elegant mt-6 leading-none block h-8 overflow-hidden">"</span>
                            </div>
                        </div>
                        <p class="font-body-elegant text-gray-600 italic leading-loose mb-10 text-lg mt-4 flex-grow">
                            {{ $t['text'] }}
                        </p>
                        <div class="flex items-center gap-4 border-t border-rose-100 pt-6">
                            <img src="{{ $t['img'] }}" alt="{{ $t['name'] }}" class="w-14 h-14 rounded-full object-cover border-2 border-white shadow-sm" />
                            <h4 class="font-serif-elegant font-semibold text-gray-900 tracking-wide text-xl">— {{ $t['name'] }}</h4>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
