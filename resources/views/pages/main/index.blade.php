@extends('layouts.default')

@section('page_title', 'Home')

@section('page_styles')
    <style>
        @keyframes zoom-in-out {
            50% {
                transform: scale(1.5)
            }

            ,
            100% {
                transform: scale(1)
            }

            ,
        }

        .zoom-in-out {
            animation: zoom-in-out 500ms linear;
        }

        /* Smooth scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
@endsection

@section('page_content')

    {{-- HERO BANNER - Warkop 6 Bersaudara Reborn --}}
    <div class="relative w-full h-[85vh] min-h-150 flex items-center overflow-hidden bg-black font-[Poppins]">
        {{-- Background Image with Dark Overlay --}}
        <div class="absolute inset-0 z-0">
            <img class="object-cover w-full h-full opacity-40 grayscale" src="img/about/banner.jpeg" alt="Banner Background">
            {{-- Overlay Gradasi untuk memastikan teks terbaca --}}
            <div class="absolute inset-0 bg-linear-to-r from-black via-black/60 to-transparent"></div>
        </div>

        {{-- Banner Content --}}
        <div class="relative z-10 w-full px-6 mx-auto max-w-7xl">
            <div class="max-w-4xl text-white">
                <h1 class="mb-8 font-light tracking-tight text-white">
                    <span
                        class="block mb-4 text-xl font-normal sm:text-2xl text-zinc-500 uppercase tracking-[0.3em] animate-fade-in">
                        Selamat Datang di
                    </span>

                    <span class="block text-5xl font-black leading-none tracking-tighter uppercase sm:text-7xl md:text-8xl">
                        Warkop 6 Bersaudara
                    </span>

                    {{-- Efek Reborn dengan Text Stroke --}}
                    <p class="mt-2 font-black tracking-tighter uppercase text-7xl sm:text-8xl md:text-9xl opacity-90"
                        style="-webkit-text-stroke: 2px white; color: transparent;">
                        Reborn
                    </p>
                </h1>

                <p class="max-w-xl mb-10 text-lg font-light tracking-wide text-gray-400 sm:text-xl opacity-80">
                    Menyajikan cita rasa autentik dengan suasana baru yang lebih segar. Temukan kenyamanan nongkrong yang
                    tak terlupakan.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="#product-categories"
                        class="group relative inline-flex items-center gap-3 px-10 py-4 text-sm font-bold tracking-[0.2em] text-black uppercase transition-all bg-white hover:bg-zinc-200">
                        Explore Menu
                        <x-mdi-arrow-right class="w-5 h-5 transition-transform group-hover:translate-x-1" />
                    </a>
                </div>
            </div>
        </div>

        {{-- Scroll Indicator --}}
        <div class="absolute z-10 -translate-x-1/2 bottom-10 left-1/2 animate-bounce">
            <x-mdi-chevron-double-down class="w-8 h-8 text-white/30" />
        </div>
    </div>


    {{-- GALLERY & MENU SECTION --}}
    <section class="py-20 bg-white font-[Poppins]">
        <div class="px-6 mx-auto max-w-7xl">
            <div class="grid grid-cols-1 gap-12 lg:grid-cols-2">

                {{-- Left Side: Text & Context --}}
                <div class="flex flex-col justify-center order-2 lg:order-1">
                    <span class="text-[10px] font-bold tracking-[0.5em] text-gray-400 uppercase mb-4 block">Visual Experience</span>
                    <h2 class="mb-6 text-4xl font-bold tracking-tighter text-black uppercase sm:text-5xl lg:text-6xl">
                        Poster & <br> <span class="italic font-light text-zinc-400">Our Signature</span> Menu
                    </h2>
                    <p class="max-w-md mb-8 text-lg font-light leading-relaxed text-gray-500">
                        Dari biji kopi pilihan hingga hidangan autentik, lihat apa yang membuat kami berbeda dalam setiap sajian.
                    </p>
                    <div class="flex gap-6">
                        <div class="flex flex-col">
                            <span class="text-2xl font-bold text-black">100%</span>
                            <span class="text-xs tracking-widest text-gray-400 uppercase">Authentic</span>
                        </div>
                        <div class="w-[1px] h-12 bg-gray-200"></div>
                        <div class="flex flex-col">
                            <span class="text-2xl font-bold text-black">Reborn</span>
                            <span class="text-xs tracking-widest text-gray-400 uppercase">Concept</span>
                        </div>
                    </div>
                </div>

                <div class="relative grid order-1 grid-cols-2 gap-4 lg:order-2">
    {{-- Image 1: Poster --}}
    <div class="relative overflow-hidden border border-zinc-800 rounded-2xl bg-zinc-900 group aspect-[3/4]">
        <img src="{{ asset('img/about/poster.jpeg') }}"
             alt="Warkop Poster"
             class="object-cover w-full h-full transition-all duration-1000 ease-in-out group-hover:scale-110 group-hover:rotate-1">

        <div class="absolute inset-0 flex items-end p-6 transition-all duration-500 opacity-0 bg-linear-to-t from-black/80 via-transparent to-transparent group-hover:opacity-100">
            <div class="transition-transform duration-500 translate-y-4 group-hover:translate-y-0">
                <span class="text-white text-[10px] font-black tracking-[0.3em] uppercase border-b border-white/30 pb-1">
                    The Poster
                </span>
            </div>
        </div>
    </div>

    {{-- Image 2: Menu --}}
    <div class="relative mt-12 overflow-hidden border border-zinc-800 rounded-2xl bg-zinc-900 group aspect-[3/4]">
        <img src="{{ asset('img/about/menu.jpeg') }}"
             alt="Warkop Menu"
             class="object-cover w-full h-full transition-all duration-1000 ease-in-out group-hover:scale-110 group-hover:-rotate-1">

        <div class="absolute inset-0 flex items-end p-6 transition-all duration-500 opacity-0 bg-linear-to-t from-black/80 via-transparent to-transparent group-hover:opacity-100">
            <div class="transition-transform duration-500 translate-y-4 group-hover:translate-y-0">
                <span class="text-white text-[10px] font-black tracking-[0.3em] uppercase border-b border-white/30 pb-1">
                    The Menu
                </span>
            </div>
        </div>
    </div>
</div>

            </div>
        </div>
    </section>

    {{-- OUR CATEGORY - Grid Elegant --}}
    <section class="py-20 bg-[#0a0a0a] text-white font-[Poppins]">
        <div class="px-6 mx-auto max-w-7xl">
            <div class="max-w-3xl mb-16">
                <h2 class="mb-4 text-4xl font-bold tracking-tight uppercase">Kategori Pilihan</h2>
                <div class="w-20 h-1 mb-6 bg-white"></div>
                <p class="text-lg font-light text-gray-400">
                    Kurasi produk terbaik untuk memenuhi gaya hidup dan kebutuhan esensial Anda.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-4">
                @php
                    $categories = [
                        [
                            'id' => 'Sembako',
                            'title' => 'Makanan Gurih',
                            'desc' => 'Daging sapi pilihan',
                            'img' => 'bakso.png',
                        ],
                        [
                            'id' => 'Makanan',
                            'title' => 'Desserts',
                            'desc' => 'Manis & berkelas',
                            'img' => 'roti-bakar.png',
                        ],
                        ['id' => 'Elektronik', 'title' => 'Minuman', 'desc' => 'Segar & murni', 'img' => 'es-teh.png'],
                        ['id' => 'Rokok', 'title' => 'Rokok', 'desc' => 'Koleksi lengkap', 'img' => 'marlong.png'],
                    ];
                @endphp

                @foreach ($categories as $cat)
                    <a href="#category-{{ $cat['id'] }}"
                        class="relative h-64 overflow-hidden border group border-white/10">
                        <div
                            class="absolute inset-0 z-0 transition-transform duration-700 bg-white/5 group-hover:scale-110">
                            <img src="{{ asset('img/categories/' . $cat['img']) }}"
                                class="object-contain w-full h-full p-10 transition-all opacity-40 grayscale group-hover:opacity-100 group-hover:grayscale-0"
                                alt="{{ $cat['title'] }}">
                        </div>
                        <div
                            class="absolute inset-0 z-10 flex flex-col justify-end p-6 bg-linear-to-t from-black to-transparent">
                            <h3 class="text-xl font-bold tracking-wider uppercase">{{ $cat['title'] }}</h3>
                            <p
                                class="mt-1 text-xs tracking-widest text-gray-400 uppercase transition-opacity opacity-0 group-hover:opacity-100">
                                View Collection →
                            </p>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </section>


    {{-- BEST ITEM - Compact & Elegant Slider --}}
    <section class="py-12 bg-white font-[Poppins]">
        <div class="px-6 mx-auto max-w-7xl">
            {{-- Header yang lebih slim --}}
            <div class="flex items-center justify-between mb-8">
                <div class="flex items-center gap-3">
                    <h2 class="text-2xl font-bold tracking-tighter text-black uppercase">Featured</h2>
                    <span class="w-8 h-px bg-black/20"></span>
                    <p class="hidden text-xs font-medium tracking-widest text-gray-400 uppercase sm:block">Best Sellers</p>
                </div>
                <div class="flex items-center gap-2 cursor-default group">
                    <span class="text-[10px] font-bold tracking-[0.2em] text-gray-400 uppercase">Slide</span>
                    <svg class="w-4 h-4 text-gray-400 transition-transform group-hover:translate-x-1" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3">
                        </path>
                    </svg>
                </div>
            </div>

            {{-- Slider Container --}}
            <div class="flex gap-4 pb-6 overflow-x-auto scrollbar-hide">
                @foreach ($products->take(8) as $product)
                    <div class="min-w-[160px] sm:min-w-[220px] group">
                        {{-- Image: Square aspect ratio untuk menghemat ruang vertikal --}}
                        <div
                            class="relative mb-4 overflow-hidden bg-[#F9F9F9] aspect-square flex items-center justify-center p-4 rounded-sm transition-all duration-300 group-hover:bg-[#F2F2F2]">

                            {{-- Image (Full Color from start) --}}
                            <img src="{{ asset('storage/' . $product->image) }}"
                                class="object-contain w-full h-full transition-transform duration-500 group-hover:scale-105"
                                alt="{{ $product->name }}">

                            {{-- Quick Action Overlay --}}
                            <div
                                class="absolute inset-0 flex items-center justify-center gap-2 transition-opacity opacity-0 bg-white/40 backdrop-blur-[2px] group-hover:opacity-100">
                                <button
                                    class="p-2 transition-all bg-white border border-gray-100 rounded-full shadow-sm hover:bg-black hover:text-white"
                                    title="Add to Wishlist">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                        </path>
                                    </svg>
                                </button>
                                <button
                                    class="p-2 transition-all bg-white border border-gray-100 rounded-full shadow-sm hover:bg-black hover:text-white"
                                    title="Add to Cart">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                                    </svg>
                                </button>
                            </div>
                        </div>

                        {{-- Text Content --}}
                        <div class="px-1">
                            <h3 class="text-[11px] font-bold tracking-widest text-black uppercase truncate mb-1">
                                {{ $product->name }}
                            </h3>
                            <p class="text-xs font-medium text-gray-500">
                                Rp {{ number_format($product->price, 0, ',', '.') }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- PRODUCT LISTINGS - Modern Elegant Grid (Functional Fixed) --}}
    <div id="product-categories" class="py-20 bg-white font-[Poppins]">
        @php $groupedProducts = $products->groupBy('category'); @endphp

        @foreach ($groupedProducts as $categoryName => $categoryProducts)
            <section id="category-{{ $categoryName }}" class="mb-24 last:mb-10 scroll-mt-24">
                <div class="px-6 mx-auto max-w-7xl">

                    {{-- Category Header --}}
                    <div class="flex items-end justify-between pb-8 mb-10 border-b border-gray-100">
                        <div>
                            <span class="text-[10px] font-bold tracking-[0.4em] text-gray-400 uppercase block mb-2">Explore
                                Our Collection</span>
                            <h2 class="text-3xl font-bold tracking-tight text-black uppercase lg:text-4xl">
                                {{ $categoryName }}
                            </h2>
                        </div>
                        <div class="hidden text-right sm:block">
                            <span class="text-sm italic font-medium text-gray-400">{{ $categoryProducts->count() }} Items
                                Available</span>
                        </div>
                    </div>

                    {{-- Product Grid --}}
                    <div class="grid grid-cols-2 gap-x-4 gap-y-12 sm:gap-x-6 md:grid-cols-3 lg:grid-cols-4 lg:gap-x-8">
                        @foreach ($categoryProducts as $product)
                            <div class="relative flex flex-col group">
                                {{-- Product Image Container --}}
                                <div
                                    class="relative overflow-hidden bg-[#F9F9F9] aspect-square transition-all duration-500 group-hover:shadow-xl">
                                    @if ($loop->first)
                                        <span
                                            class="absolute top-3 left-3 z-10 bg-black text-white text-[9px] font-bold uppercase px-2 py-1 tracking-widest">New</span>
                                    @endif

                                    {{-- Image --}}
                                    <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                        class="object-contain w-full h-full p-6 transition-transform duration-700 group-hover:scale-110">

                                    {{-- FUNCTIONAL ACTION BUTTONS --}}
                                    {{-- FUNCTIONAL ACTION BUTTONS --}}
                                    <div
                                        class="absolute flex flex-col gap-2 transition-all duration-300 translate-x-12 opacity-0 top-3 right-3 group-hover:translate-x-0 group-hover:opacity-100">

                                        {{-- Wishlist Form --}}
                                        <form action="{{ route('wishlist.add', $product) }}" method="POST">
                                            @csrf
                                            @php
                                                // Cek apakah produk ada di wishlist user yang sedang login
                                                $isWishlisted =
                                                    auth()->check() &&
                                                    auth()->user()->wishlistItems->contains('product_id', $product->id);
                                            @endphp
                                            <button type="submit"
                                                class="flex items-center justify-center p-2 transition-colors border border-gray-100 rounded-full shadow-sm
            {{ $isWishlisted ? 'bg-black text-white' : 'bg-white text-black hover:bg-black hover:text-white' }}"
                                                title="{{ $isWishlisted ? 'In Wishlist' : 'Add to Wishlist' }}">
                                                @if ($isWishlisted)
                                                    <x-mdi-heart class="w-5 h-5" /> {{-- Ikon solid jika sudah ada --}}
                                                @else
                                                    <x-mdi-heart-outline class="w-5 h-5" />
                                                @endif
                                            </button>
                                        </form>

                                        {{-- Cart Form --}}
                                        <form action="{{ route('cart.add', $product) }}" method="POST">
                                            @csrf
                                            @php
                                                // Cek apakah produk ada di keranjang user yang sedang login
                                                $isInCart =
                                                    auth()->check() &&
                                                    auth()->user()->cartItems->contains('product_id', $product->id);
                                            @endphp
                                            <button type="submit"
                                                class="flex items-center justify-center p-2 transition-colors border border-gray-100 rounded-full shadow-sm
            {{ $isInCart ? 'bg-black text-white' : 'bg-white text-black hover:bg-black hover:text-white' }}"
                                                title="{{ $isInCart ? 'In Cart' : 'Add to Cart' }}">
                                                <x-mdi-cart-outline class="w-5 h-5" />
                                            </button>
                                        </form>
                                    </div>

                                    {{-- View Details Link - Mengarah ke route edit sesuai web.php --}}
                                    <div
                                        class="absolute inset-x-0 bottom-0 p-3 transition-transform duration-300 translate-y-full group-hover:translate-y-0 bg-linear-to-t from-white/90 to-transparent">
                                        <a
                                            class="block w-full py-2 bg-black text-white text-center text-[10px] font-bold uppercase tracking-widest hover:bg-gray-800 transition-colors">
                                            View Details
                                        </a>
                                    </div>
                                </div>

                                {{-- Product Info --}}
                                <div class="mt-5 text-center sm:text-left">
                                    <h3 class="text-xs font-bold tracking-widest text-gray-900 uppercase truncate">
                                        {{ $product->name }}
                                    </h3>
                                    <div class="flex items-center justify-center gap-2 mt-2 sm:justify-start">
                                        <span class="text-sm font-semibold text-black">
                                            Rp {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endforeach
    </div>

    <script src="scripts/homepage.js"></script>

    <style>
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        html {
            scroll-behavior: smooth;
        }
    </style>

@endsection
