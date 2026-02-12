{{-- Yummilicious bakery homepage (Elegant + Cute + Premium + Soft Luxury Pink) --}}
<x-app-layout>
    {{-- HERO --}}
    <section class="relative w-full min-h-[520px] md:min-h-[640px] overflow-hidden bg-pink-50">
        <img
            src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=2000&q=80"
            alt="Fresh cake being decorated"
            class="absolute inset-0 w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-gradient-to-b from-black/40 via-black/25 to-pink-50/95"></div>

        <div class="relative max-w-7xl mx-auto px-6 pt-20 md:pt-28 pb-16 md:pb-24">
            <div class="max-w-2xl text-white">
                <p class="inline-flex items-center gap-2 bg-white/15 border border-white/25 px-4 py-2 rounded-full text-sm backdrop-blur">
                    <span>🍰</span>
                    Freshly baked • Handmade with love
                </p>

                <h1 class="mt-5 text-4xl md:text-6xl font-extrabold leading-tight drop-shadow">
                    Sweet moments, <span class="text-pink-200">beautifully baked</span>
                </h1>

                <p class="mt-4 text-base md:text-lg text-white/90 leading-relaxed">
                    Cakes, brownies, cookies, cupcakes and wedding treats — crafted with quality ingredients and a luxury finish.
                </p>

                <div class="mt-7 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('products.index') }}"
                       class="inline-flex items-center justify-center px-7 py-3.5 rounded-xl bg-pink-500 hover:bg-pink-600 text-white font-semibold shadow-lg shadow-pink-500/30 transition">
                        Order Online
                        <span class="ml-2">🛒</span>
                    </a>

                    <a href="{{ route('about') }}"
                       class="inline-flex items-center justify-center px-7 py-3.5 rounded-xl bg-white/15 hover:bg-white/20 border border-white/25 text-white font-semibold backdrop-blur transition">
                        About Us
                        <span class="ml-2">✨</span>
                    </a>
                </div>

                <div class="mt-8 grid grid-cols-2 sm:grid-cols-3 gap-3 max-w-lg">
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-4 backdrop-blur">
                        <p class="text-sm text-white/85">Delivery</p>
                        <p class="font-semibold">Fast & Fresh 🚚</p>
                    </div>
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-4 backdrop-blur">
                        <p class="text-sm text-white/85">Custom</p>
                        <p class="font-semibold">Made for You 🎀</p>
                    </div>
                    <div class="bg-white/10 border border-white/20 rounded-2xl p-4 backdrop-blur">
                        <p class="text-sm text-white/85">Quality</p>
                        <p class="font-semibold">Premium Taste 💎</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- WELCOME --}}
    <section class="bg-gradient-to-b from-pink-50 to-white border-y border-pink-100">
        <div class="max-w-7xl mx-auto px-6 py-14 md:py-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 items-center">

                {{-- Quote --}}
                <div class="text-center lg:text-left">
                    <p class="text-3xl md:text-4xl text-pink-800 leading-relaxed"
                       style="font-family: 'Dancing Script', cursive;">
                        “Every cake we bake tells a story — of love, joy, and moments worth celebrating.”
                    </p>

                    <p class="mt-6 text-gray-600 leading-relaxed">
                        From birthdays to weddings, we make desserts that look stunning and taste unforgettable.
                        Soft luxury vibes, cute designs, and premium finishes — all in one.
                    </p>

                    <div class="mt-7 flex gap-3 justify-center lg:justify-start">
                        <a href="{{ route('products.index') }}"
                           class="px-6 py-3 rounded-xl bg-pink-500 text-white font-semibold hover:bg-pink-600 transition shadow shadow-pink-500/20">
                            Explore Products
                        </a>
                        <a href="{{ route('about') }}"
                           class="px-6 py-3 rounded-xl bg-white border border-pink-200 text-pink-700 font-semibold hover:bg-pink-50 transition">
                            Learn More
                        </a>
                    </div>
                </div>

                {{-- Welcome Card --}}
                <div class="bg-white rounded-3xl shadow-xl border border-pink-100 p-8 md:p-10">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-pink-100 flex items-center justify-center text-2xl">
                            🧁
                        </div>
                        <h2 class="text-3xl font-extrabold text-pink-800">Welcome to Yummilicious</h2>
                    </div>

                    <p class="mt-4 text-gray-600">
                        We create cakes, brownies, cookies and wedding treats with passion,
                        quality ingredients, and artistic presentation.
                    </p>

                    <div class="mt-6 grid grid-cols-2 gap-3">
                        @foreach(['Cakes 🍰','Brownies 🍫','Cookies 🍪','Wedding Treats 💍'] as $item)
                            <div class="rounded-2xl bg-pink-50 border border-pink-100 px-4 py-3 text-gray-700 font-medium">
                                {{ $item }}
                            </div>
                        @endforeach
                    </div>

                    <div class="mt-7">
                        <a href="{{ route('products.index') }}"
                           class="inline-flex w-full items-center justify-center px-6 py-3 rounded-xl bg-gradient-to-r from-pink-500 to-rose-500 text-white font-semibold shadow-lg shadow-pink-500/25 hover:opacity-95 transition">
                            Shop Now
                            <span class="ml-2">✨</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- FEATURED PRODUCTS --}}
    <section class="py-14 md:py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-pink-800">
                    Newly Introduced
                </h2>
                <p class="mt-3 text-gray-600">
                    Fresh arrivals — made to impress ✨
                </p>
            </div>

            <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-7">
                @forelse($featuredProducts ?? [] as $product)
                    <div class="group bg-white rounded-3xl border border-pink-100 shadow-lg overflow-hidden hover:shadow-xl transition">
                        <div class="relative">
                            <img
                                src="{{ $product->image
                                    ? asset('storage/' . $product->image)
                                    : 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=900&q=80' }}"
                                alt="{{ $product->name }}"
                                class="w-full h-56 object-cover"
                            />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/35 via-transparent to-transparent"></div>

                            <div class="absolute bottom-3 left-3">
                                <span class="text-xs uppercase tracking-wider bg-white/85 text-pink-700 px-3 py-1 rounded-full">
                                    {{ $product->category ?? 'Bakery' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-6 text-center">
                            <h3 class="font-extrabold text-lg text-gray-800">
                                {{ $product->name }}
                            </h3>

                            <p class="mt-2 text-pink-700 font-extrabold text-xl">
                                LKR {{ number_format($product->price ?? 0, 2) }}
                            </p>

                            <div class="mt-4">
                                <livewire:add-to-cart-button
                                    :product-id="$product->id"
                                    :stock="$product->stock"
                                />
                            </div>

                            <p class="mt-3 text-xs text-gray-500">
                                Freshly made • Premium finish 💎
                            </p>
                        </div>
                    </div>
                @empty
                    {{-- Fallback --}}
                    @foreach([
                        ['name'=>'Pineapple Cake','price'=>'2400.00'],
                        ['name'=>'Macarons Box','price'=>'1500.00'],
                        ['name'=>'Caramel Brownies','price'=>'1200.00'],
                    ] as $item)
                        <div class="bg-pink-50/50 rounded-3xl border border-pink-100 shadow-md p-8 text-center">
                            <h3 class="font-extrabold text-gray-800">{{ $item['name'] }}</h3>
                            <p class="text-pink-700 mt-3 font-extrabold text-xl">LKR {{ $item['price'] }}</p>
                            <a href="{{ route('products.index') }}"
                               class="mt-5 inline-flex items-center justify-center px-6 py-3 rounded-xl bg-pink-500 text-white font-semibold hover:bg-pink-600 transition">
                                Order Online
                            </a>
                        </div>
                    @endforeach
                @endforelse
            </div>
        </div>
    </section>

    {{-- HOW TO ORDER (Premium arrows + numbers) --}}
    <section class="py-16 md:py-20 bg-pink-50 border-y border-pink-100">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-5xl font-extrabold text-pink-800">
                How to Order
            </h2>
            <p class="mt-3 text-gray-600 text-lg">
                Simple steps to get your treats delivered 💕
            </p>

            <div class="mt-14 relative grid md:grid-cols-3 gap-8 items-stretch">

                {{-- connector line --}}
                <div class="hidden md:block absolute top-[72px] left-[12%] right-[12%] h-[3px] bg-gradient-to-r from-pink-200 via-pink-300 to-pink-200 rounded-full"></div>

                {{-- connector arrows --}}
                <div class="hidden md:block absolute top-[56px] left-[33%] text-pink-400 text-3xl">➜</div>
                <div class="hidden md:block absolute top-[56px] left-[66%] text-pink-400 text-3xl">➜</div>

                @php
                    $steps = [
                        ['num'=>'01','icon'=>'🧁','title'=>'Pick a product','text'=>'Browse cakes, cookies, brownies and more.'],
                        ['num'=>'02','icon'=>'🛒','title'=>'Add to cart','text'=>'Choose quantity and confirm your order.'],
                        ['num'=>'03','icon'=>'🚚','title'=>'Get it delivered','text'=>'We prepare fresh and deliver to you.'],
                    ];
                @endphp

                @foreach($steps as $s)
                    <div class="bg-white rounded-3xl shadow-lg border border-pink-100 p-8 hover:shadow-xl transition">
                        <div class="w-16 h-16 mx-auto mb-6 flex items-center justify-center
                                    bg-gradient-to-r from-pink-500 to-rose-500 text-white
                                    rounded-full text-xl font-extrabold shadow-md shadow-pink-500/25">
                            {{ $s['num'] }}
                        </div>

                        <div class="text-4xl mb-4">{{ $s['icon'] }}</div>

                        <h3 class="text-xl font-extrabold text-gray-800 mb-2">
                            {{ $s['title'] }}
                        </h3>

                        <p class="text-gray-600">
                            {{ $s['text'] }}
                        </p>
                    </div>
                @endforeach

            </div>

            <div class="mt-10">
                <a href="{{ route('products.index') }}"
                   class="inline-flex items-center justify-center px-8 py-4 rounded-2xl
                          bg-gradient-to-r from-pink-500 to-rose-500 text-white font-extrabold
                          shadow-xl shadow-pink-500/25 hover:opacity-95 transition">
                    Start Ordering
                    <span class="ml-2">✨</span>
                </a>
            </div>
        </div>
    </section>

    {{-- PROMO --}}
    <section class="py-16 md:py-20 bg-white">
        <div class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-10 items-center">
            <div class="relative">
                <img
                    src="https://images.unsplash.com/photo-1614707267537-4270a24a62b4?w=1200&q=80"
                    class="rounded-3xl shadow-xl"
                    alt="Cupcakes"
                />
                <div class="absolute -bottom-5 -left-5 bg-white rounded-3xl shadow-lg border border-pink-100 px-6 py-4">
                    <p class="text-sm text-gray-500">Limited time</p>
                    <p class="text-pink-700 font-extrabold text-lg">Fresh batches daily ✨</p>
                </div>
            </div>

            <div>
                <h3 class="text-3xl md:text-4xl font-extrabold text-pink-800">
                    From our oven to your door
                </h3>
                <p class="mt-4 text-gray-600 text-lg leading-relaxed">
                    Order online anytime. We bake with care, pack beautifully, and deliver fresh.
                </p>

                <div class="mt-7 flex flex-col sm:flex-row gap-3">
                    <a href="{{ route('products.index') }}"
                       class="px-8 py-4 rounded-2xl bg-pink-500 text-white font-extrabold hover:bg-pink-600 transition shadow shadow-pink-500/20">
                        Online Order
                    </a>
                    <a href="{{ route('about') }}"
                       class="px-8 py-4 rounded-2xl bg-white border border-pink-200 text-pink-700 font-extrabold hover:bg-pink-50 transition">
                        Our Story
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS --}}
    <section class="py-16 md:py-20 bg-gradient-to-b from-white to-pink-50">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center">
                <h2 class="text-3xl md:text-4xl font-extrabold text-pink-800">
                    What Our Customers Say
                </h2>
                <p class="mt-3 text-gray-600">
                    Real smiles, real sweetness 💕
                </p>
            </div>

            <div class="mt-12 grid md:grid-cols-3 gap-7">
                @foreach([
                    ['name'=>'Amy','text'=>'Fresh and beautifully decorated cakes!'],
                    ['name'=>'Joel & Maria','text'=>'Perfect wedding cake. Stunning taste.'],
                    ['name'=>'Valencia','text'=>'Best brownies in town!'],
                ] as $t)
                    <div class="bg-white rounded-3xl shadow-lg border border-pink-100 p-7 hover:shadow-xl transition">
                        <div class="flex items-center justify-between">
                            <h3 class="font-extrabold text-pink-800 text-lg">{{ $t['name'] }}</h3>
                            <span class="text-2xl">💖</span>
                        </div>
                        <p class="mt-3 text-gray-600 italic leading-relaxed">
                            “{{ $t['text'] }}”
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
