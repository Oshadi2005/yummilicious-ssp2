{{-- Yummilicious bakery homepage (Luxury, Elegant, Artisan Aesthetic) --}}
<x-app-layout>
    {{-- Typography setup for elegant serif fonts --}}
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Lora:ital,wght@0,400;0,500;1,400&display=swap');
        .font-serif-elegant { font-family: 'Playfair Display', serif; }
        .font-body-elegant { font-family: 'Lora', serif; }
    </style>

    {{-- HERO SECTION - Editorial Split Layout --}}
    <section class="relative w-full min-h-[90vh] flex flex-col lg:flex-row bg-[#FAFAFA]">
        <div class="relative w-full lg:w-1/2 flex items-center justify-center p-8 lg:p-20 z-10">
            <div class="max-w-xl">
                <p class="uppercase tracking-[0.3em] text-[11px] font-bold text-rose-800 mb-6 bg-rose-100 inline-block px-4 py-1">Artisan Bakery & Patisserie</p>
                <h1 class="text-5xl md:text-7xl font-serif-elegant font-bold text-gray-900 leading-tight mb-6">
                    Elevating the <br/><span class="text-rose-400 italic font-medium">art of baking</span>
                </h1>
                <p class="font-body-elegant text-gray-500 text-lg md:text-xl leading-relaxed mb-10">
                    Handcrafted cakes, delicate macarons, and artisan treats crafted with the finest ingredients and an eye for unparalleled elegance.
                </p>
                
                <div class="flex flex-col sm:flex-row gap-5">
                    <a href="{{ route('products.index') }}" class="inline-flex justify-center items-center px-8 py-4 bg-gray-900 text-white font-medium tracking-wide hover:bg-rose-900 transition-colors duration-500 rounded-sm">
                        Explore Collection
                    </a>
                    <a href="{{ route('about') }}" class="inline-flex justify-center items-center px-8 py-4 border border-gray-300 text-gray-900 font-medium tracking-wide hover:border-gray-900 transition-colors duration-500 rounded-sm">
                        Our Story
                    </a>
                </div>
            </div>
        </div>
        <div class="relative w-full lg:w-1/2 min-h-[50vh] lg:min-h-full">
            <img src="{{ asset('images/home_hero.jpg') }}" alt="Elegant luxury cake" class="absolute inset-0 w-full h-full object-cover" />
        </div>
    </section>

    {{-- WELCOME BANNER --}}
    <section class="bg-[#FDFBF7] py-20 border-b border-rose-50">
        <div class="max-w-4xl mx-auto px-6 text-center">
            <svg class="w-8 h-8 mx-auto text-rose-300 mb-6" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8zm-1-13h2v6h-2zm0 8h2v2h-2z"/></svg>
            <h2 class="text-3xl md:text-4xl font-serif-elegant font-semibold text-gray-900 mb-6 flex flex-col items-center leading-snug">
                “A symphony of flavors, tailored for your most precious moments.”
            </h2>
            <p class="font-body-elegant text-gray-500 leading-loose max-w-2xl mx-auto">
                Welcome to Yummilicious. We believe that every celebration deserves a centerpiece that is as breathtaking as the memories you are creating. Soft luxury vibes, flawless designs, and premium finishes.
            </p>
        </div>
    </section>

    {{-- NEWLY INTRODUCED (Limited to 4, Side-by-Side as designed but more refined) --}}
    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-16">
                <div>
                    <h2 class="text-4xl md:text-5xl font-serif-elegant font-bold text-gray-900">New Arrivals</h2>
                    <p class="font-body-elegant text-gray-500 mt-4 text-lg">Our latest curated delicacies, baked to perfection.</p>
                </div>
                <div class="mt-6 md:mt-0">
                    <a href="{{ route('products.index') }}" class="text-sm font-semibold tracking-wider uppercase text-rose-500 hover:text-gray-900 border-b pb-1 border-rose-200 hover:border-gray-900 transition-colors">
                        View Full Menu
                    </a>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
                @forelse(collect($featuredProducts ?? [])->take(4) as $product)
                    <div class="group flex flex-col sm:flex-row bg-[#FAFAFA] hover:bg-[#FDFBF7] transition-colors duration-500 overflow-hidden border border-gray-100">
                        <div class="relative sm:w-1/2 overflow-hidden h-72 sm:h-auto">
                            <img src="{{ $product->image ? (Str::startsWith($product->image, 'http') ? $product->image : asset('storage/' . $product->image)) : 'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=900&q=80' }}" alt="{{ $product->name }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" />
                        </div>
                        <div class="p-8 sm:w-1/2 flex flex-col justify-center">
                            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-rose-500 mb-3 block">{{ $product->category->name ?? 'Patisserie' }}</span>
                            <h3 class="font-serif-elegant text-2xl text-gray-900 mb-3 group-hover:text-rose-900 transition-colors">
                                {{ $product->name }}
                            </h3>
                            <p class="font-body-elegant text-gray-500 text-sm leading-relaxed mb-6">
                                {{ $product->description ?? 'An exquisite new creation, balancing delicate flavors with an elegant visual presentation.' }}
                            </p>
                            <p class="text-gray-900 font-medium tracking-wide">
                                LKR {{ number_format($product->price ?? 0, 2) }}
                            </p>
                        </div>
                    </div>
                @empty
                    {{-- Luxurious Fallback Items (Exactly 4) --}}
                    @foreach([
                        ['name'=>'Rose Pistachio Gateau', 'price'=>'2800.00', 'desc'=>'Layers of delicate pistachio sponge infused with pure rose water and light mascarpone cream.', 'img'=>'https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=800&q=80', 'cat'=>'Signature Cake'],
                        ['name'=>'Vanilla Bean Macarons', 'price'=>'1800.00', 'desc'=>'Classic Parisian macarons filled with rich, whipped Madagascar vanilla bean white chocolate ganache.', 'img'=>'https://images.unsplash.com/photo-1569864358642-9d1684040f43?w=800&q=80', 'cat'=>'Macaron'],
                        ['name'=>'Dark Cocoa Entremet', 'price'=>'2200.00', 'desc'=>'A mirror-glazed chocolate entremet featuring a crispy praline base and velvety dark chocolate mousse.', 'img'=>'https://images.unsplash.com/photo-1606313564200-e75d5e30476c?w=800&q=80', 'cat'=>'Dessert'],
                        ['name'=>'Summer Berry Tart', 'price'=>'2100.00', 'desc'=>'An artisanal butter crust enveloping smooth vanilla crème pâtissière, adorned with fresh summer berries.', 'img'=>'https://images.unsplash.com/photo-1519869325930-281384150729?w=800&q=80', 'cat'=>'Tart'],
                    ] as $item)
                        <div class="group flex flex-col sm:flex-row bg-[#FAFAFA] hover:bg-[#FDFBF7] transition-colors duration-500 overflow-hidden border border-gray-100">
                             <div class="relative sm:w-1/2 overflow-hidden h-72 sm:h-auto">
                                 <img src="{{ $item['img'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                             </div>
                             <div class="p-8 sm:w-1/2 flex flex-col justify-center">
                                 <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-rose-500 mb-3 block">{{ $item['cat'] }}</span>
                                 <h3 class="font-serif-elegant text-2xl text-gray-900 mb-3 group-hover:text-rose-900 transition-colors">{{ $item['name'] }}</h3>
                                 <p class="font-body-elegant text-gray-500 text-sm leading-relaxed mb-6">{{ $item['desc'] }}</p>
                                 <p class="text-gray-900 font-medium tracking-wide">LKR {{ $item['price'] }}</p>
                             </div>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>

    {{-- HOW TO ORDER (Redesigned: Minimalist, no arrows, pure elegance) --}}
    <section class="py-24 bg-[#FAFAFA]">
        <div class="max-w-6xl mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-serif-elegant font-bold text-gray-900">Seamless Experience</h2>
                <p class="font-body-elegant text-gray-500 mt-4 text-lg">Curated ordering, from our kitchen to your table.</p>
            </div>

            <div class="grid md:grid-cols-3 gap-12 text-center">
                @foreach([
                    ['num'=>'I','title'=>'Discover','desc'=>'Explore our meticulously crafted collections online.'],
                    ['num'=>'II','title'=>'Select','desc'=>'Choose your delicacies and personalize your order.'],
                    ['num'=>'III','title'=>'Savor','desc'=>'Delivered freshly and flawlessly to your doorstep.'],
                ] as $step)
                    <div class="flex flex-col items-center">
                        <div class="mb-6 h-16 w-16 flex items-center justify-center border border-rose-200 bg-white rounded-full text-xl font-serif-elegant text-rose-800 shadow-sm">
                            {{ $step['num'] }}
                        </div>
                        <h3 class="font-serif-elegant text-2xl text-gray-900 mb-4">{{ $step['title'] }}</h3>
                        <p class="font-body-elegant text-gray-500 leading-relaxed">{{ $step['desc'] }}</p>
                    </div>
                @endforeach
            </div>
            
            <div class="mt-16 text-center">
                <a href="{{ route('products.index') }}" class="inline-block border-b border-gray-900 pb-1 text-gray-900 font-medium tracking-widest uppercase text-sm hover:text-rose-500 hover:border-rose-500 transition-colors">
                    Begin Your Order
                </a>
            </div>
        </div>
    </section>

    {{-- ELEGANT PROMO --}}
    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-16 items-center">
            <div class="order-2 md:order-1 flex flex-col justify-center">
                <p class="uppercase tracking-[0.2em] text-[11px] font-bold text-rose-800 mb-4 bg-rose-50 inline-block px-3 py-1 self-start">Gifting Collection</p>
                <h3 class="text-4xl md:text-5xl font-serif-elegant font-bold text-gray-900 leading-tight mb-6">
                    Gifts that <br/><span class="text-gray-400 italic">speak volumes</span>
                </h3>
                <p class="font-body-elegant text-gray-500 leading-relaxed mb-8 text-lg">
                    Whether it is a grand celebration or an intimate gesture, our bespoke premium packaging ensures your gift leaves a lasting impression before the first bite.
                </p>
                <div>
                     <a href="{{ route('products.index') }}" class="inline-flex justify-center items-center px-8 py-4 bg-gray-100 text-gray-900 font-medium tracking-wide hover:bg-gray-200 transition-colors rounded-sm">
                        View Gift Sets
                    </a>
                </div>
            </div>
            <div class="order-1 md:order-2 relative px-4">
                <div class="absolute inset-0 bg-rose-50 transform translate-x-4 translate-y-4 -z-10 rounded-sm"></div>
                <img src="https://images.unsplash.com/photo-1549465220-1a8b9238cd48?w=1000&q=80" class="w-full h-auto object-cover rounded-sm shadow-lg border border-white" alt="Premium packaged treats" />
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS (Sophisticated) --}}
    <section class="py-24 bg-[#FDFBF7]">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-xs font-bold tracking-[0.2em] uppercase text-rose-500 text-center mb-16">Words of Appreciation</h2>
            
            <div class="grid md:grid-cols-3 gap-12">
                @foreach([
                    ['name'=>'A. Sinclair','img'=>'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&q=80','text'=>'The visual presentation was absolutely breathtaking, and the flavor profile exceeded every expectation. True artisans.'],
                    ['name'=>'J. & M. Kingston','img'=>'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=150&q=80','text'=>'Our wedding cake was a masterpiece. Elegant, flawless, and unforgettable. The attention to detail is remarkable.'],
                    ['name'=>'V. Laurent','img'=>'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&q=80','text'=>'An indulgence unlike any other. The textures, the subtle sweetness... easily the finest patisserie I have experienced.'],
                ] as $t)
                    <div class="text-center px-6">
                        <div class="text-rose-300 text-4xl mb-4 font-serif-elegant">"</div>
                        <p class="font-body-elegant text-gray-600 italic leading-loose mb-8 text-lg">
                            {{ $t['text'] }}
                        </p>
                        <img src="{{ $t['img'] }}" alt="{{ $t['name'] }}" class="w-16 h-16 rounded-full object-cover mx-auto mb-4 border-4 border-rose-50 shadow-sm" />
                        <h4 class="font-serif-elegant font-semibold text-gray-900 tracking-wide text-xl">{{ $t['name'] }}</h4>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
