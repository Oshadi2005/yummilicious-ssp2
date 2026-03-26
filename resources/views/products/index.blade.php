<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Lora:ital,wght@0,400;0,500;1,400&display=swap');
        .font-serif-elegant { font-family: 'Playfair Display', serif; }
        .font-body-elegant { font-family: 'Lora', serif; }
    </style>

    <section class="bg-[#FDFBF7] py-20 border-b border-rose-50 text-center">
        <div class="max-w-4xl mx-auto px-6">
            <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-rose-500 mb-4 block">Patisserie Menu</span>
            <h1 class="text-4xl md:text-5xl font-serif-elegant font-bold text-gray-900 mb-6 flex flex-col items-center leading-snug">
                The Artisan Collection
            </h1>
            <p class="font-body-elegant text-gray-500 text-lg leading-loose max-w-2xl mx-auto">
                Explore our meticulously crafted delicacies and place your bespoke order today.
            </p>
        </div>
    </section>

    <main class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            @if($products->isEmpty())
                <div class="text-center py-24 border border-gray-100 bg-[#FAFAFA]">
                    <div class="text-rose-200 text-6xl mb-6">✧</div>
                    <p class="font-serif-elegant text-gray-500 text-2xl mb-4 italic">"Our ovens are currently resting."</p>
                    <p class="font-body-elegant text-gray-400 uppercase tracking-widest text-xs font-bold">No delicacies available at the moment. Please return later.</p>
                </div>
            @else
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
                    @foreach ($products as $product)
                        <div class="group flex flex-col">
                            <!-- Product Image -->
                            <div class="relative w-full h-80 overflow-hidden mb-6 bg-[#FAFAFA] border border-gray-100">
                                @if ($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" 
                                         alt="{{ $product->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                                @else
                                    <div class="w-full h-full flex items-center justify-center font-body-elegant text-gray-400 italic">
                                        Artisan Image Pending
                                    </div>
                                @endif
                                
                                <div class="absolute top-4 right-4 bg-white/95 backdrop-blur-md px-4 py-1.5 text-[10px] uppercase tracking-[0.2em] text-gray-900 font-bold shadow-sm border border-gray-100/50">
                                   LKR {{ number_format($product->price, 2) }}
                                </div>
                            </div>

                            <!-- Product Info -->
                            <div class="flex-1 flex flex-col text-center px-4">
                                <span class="text-[10px] font-bold uppercase tracking-[0.2em] text-rose-400 mb-3">{{ $product->category ?? 'Delicacy' }}</span>
                                <h3 class="font-serif-elegant text-2xl text-gray-900 mb-3">{{ $product->name }}</h3>
                                <p class="font-body-elegant text-gray-500 text-sm mb-6 flex-1 leading-relaxed">
                                    {{ Str::limit($product->description ?? 'Expertly crafted with premium ingredients for a delightful experience.', 60) }}
                                </p>
                                
                                <p class="text-[10px] uppercase tracking-[0.2em] text-gray-400 mb-6 font-semibold">Stock: {{ $product->stock }}</p>

                                <div class="mt-auto w-full [&>button]:!w-full [&>button]:!py-3 [&>button]:!rounded-none [&>button]:!bg-gray-900 [&>button]:hover:!bg-rose-900 [&>button]:!transition-colors [&>button]:!duration-500 [&>button]:!text-[11px] [&>button]:!uppercase [&>button]:!tracking-[0.2em] [&>button]:!font-bold">
                                    <livewire:add-to-cart-button 
                                        :product-id="$product->id" 
                                        :stock="$product->stock"
                                        :wire:key="'product-'.$product->id" />
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </main>
</x-app-layout>
