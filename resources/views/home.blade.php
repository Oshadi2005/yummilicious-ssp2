{{-- Yummilicious bakery homepage --}}
<x-app-layout>
    {{-- HERO SECTION --}}
    <section class="relative w-full h-[50vh] min-h-[320px] max-h-[500px] overflow-hidden">
        <img
            src="https://images.unsplash.com/photo-1565958011703-44f9829ba187?w=1600&q=80"
            alt="Fresh cake being decorated"
            class="absolute inset-0 w-full h-full object-cover"
        />
        <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
        <div class="absolute bottom-0 left-0 right-0 p-6 md:p-10 text-white text-center">
            <p class="text-lg md:text-xl font-medium drop-shadow">
                Handmade with care, served with a smile
            </p>
        </div>
    </section>

    {{-- WELCOME + QUOTE SECTION --}}
    <section class="bg-pink-50/80 border-y border-pink-100">
        <div class="max-w-7xl mx-auto px-4 py-12 md:py-16">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                
                {{-- QUOTE --}}
                <div class="text-center lg:text-left">
                    <p class="text-3xl lg:text-4xl text-pink-800 leading-relaxed"
                       style="font-family: 'Dancing Script', cursive;">
                        “Every cake we bake tells a story – of love, joy, and moments worth celebrating.”
                    </p>
                </div>

                {{-- WELCOME CARD --}}
                <div class="bg-white/90 rounded-2xl shadow-lg border border-pink-100 p-8">
                    <h2 class="text-3xl font-semibold text-pink-800 mb-4">Welcome</h2>
                    <p class="text-gray-600 mb-4">
                        At Yummilicious, we create cakes, brownies, cookies and wedding treats with passion,
                        quality ingredients, and artistic presentation.
                    </p>

                    <ul class="space-y-2 text-gray-600 mb-6">
                        <li>• Cakes</li>
                        <li>• Brownies</li>
                        <li>• Cookies</li>
                        <li>• Wedding flavours</li>
                    </ul>

                    <a href="{{ route('about') }}"
                       class="inline-flex px-6 py-3 bg-pink-500 text-white font-semibold rounded-lg hover:bg-pink-600 transition">
                        About Us
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- FEATURED PRODUCTS --}}
    <section class="py-12 md:py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl font-semibold text-pink-800 text-center mb-10">
                Newly Introduced
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">

                @forelse($featuredProducts ?? [] as $product)
                    <div class="bg-pink-50/50 rounded-2xl border border-pink-100 shadow-md hover:shadow-lg transition">
                        <img
                            src="{{ $product->image
                                ? asset('storage/' . $product->image)
                                : 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?w=400&q=80' }}"
                            alt="{{ $product->name }}"
                            class="w-full h-56 object-cover rounded-t-2xl"
                        />

                        <div class="p-5 text-center">
                            <span class="text-xs uppercase text-pink-600">{{ $product->category }}</span>
                            <h3 class="font-semibold text-lg mt-1">{{ $product->name }}</h3>
                            <p class="text-pink-700 font-semibold mt-2">
                                ${{ number_format($product->price, 2) }}
                            </p>

                            <livewire:add-to-cart-button
                                :product-id="$product->id"
                                :stock="$product->stock"
                            />
                        </div>
                    </div>
                @empty
                    {{-- FALLBACK STATIC PRODUCTS --}}
                    @foreach([
                        ['name'=>'Pineapple Cake','price'=>'24.99'],
                        ['name'=>'Macarons','price'=>'3.50'],
                        ['name'=>'Caramel Brownies','price'=>'4.50'],
                    ] as $item)
                        <div class="bg-pink-50/50 rounded-2xl border border-pink-100 shadow-md p-6 text-center">
                            <h3 class="font-semibold">{{ $item['name'] }}</h3>
                            <p class="text-pink-700 mt-2">${{ $item['price'] }}</p>
                            <a href="{{ route('products.index') }}"
                               class="mt-3 block bg-pink-500 text-white py-2 rounded-lg">
                                Order Online
                            </a>
                        </div>
                    @endforeach
                @endforelse

            </div>
        </div>
    </section>

    {{-- PROMOTIONAL SECTION --}}
    <section class="py-12 bg-pink-50/80 border-y border-pink-100">
        <div class="max-w-5xl mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
            <img
                src="https://images.unsplash.com/photo-1614707267537-4270a24a62b4?w=800&q=80"
                class="rounded-2xl shadow-lg"
                alt="Cupcakes"
            />
            <div>
                <p class="text-2xl text-gray-700 mb-6">
                    From our oven to your door – shop online today!
                </p>
                <a href="{{ route('products.index') }}"
                   class="px-8 py-4 bg-pink-500 text-white rounded-lg font-semibold">
                    Online Order
                </a>
            </div>
        </div>
    </section>

    {{-- TESTIMONIALS --}}
    <section class="py-12 bg-white">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-3xl text-pink-800 font-semibold text-center mb-10">
                What Our Customers Say
            </h2>

            <div class="grid md:grid-cols-3 gap-8">
                @foreach([
                    ['name'=>'Amy','text'=>'Fresh and beautifully decorated cakes!'],
                    ['name'=>'Joel & Maria','text'=>'Perfect wedding cake. Stunning taste.'],
                    ['name'=>'Valencia','text'=>'Best brownies in town!'],
                ] as $t)
                    <div class="bg-pink-50/50 p-6 rounded-2xl text-center shadow">
                        <h3 class="font-semibold text-pink-800">{{ $t['name'] }}</h3>
                        <p class="italic text-gray-600 mt-2">“{{ $t['text'] }}”</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
