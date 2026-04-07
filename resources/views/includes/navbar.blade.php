<nav class="sticky top-0 z-50 border-b bg-zinc-950 border-white/5 backdrop-blur-md">
    <div class="px-3 mx-auto max-w-7xl sm:px-4 lg:px-8">
        <div class="flex items-center justify-between gap-2 h-14 sm:h-16 lg:h-18 sm:gap-4">

            <div class="flex items-center gap-2 shrink-0 sm:gap-3 lg:gap-4">
                <img src="{{ asset('img/logo/logo.png') }}"
                     class="object-contain h-10 sm:h-12 lg:h-14 xl:h-16 brightness-110 contrast-125"
                     alt="Logo Warmad">

                @auth
                    <div class="flex-col hidden sm:flex">
                        <h1 class="text-[10px] text-zinc-500 uppercase tracking-widest font-medium">Welcome back</h1>
                        <h1 class="text-xs font-semibold text-white xl:hidden sm:text-sm whitespace-nowrap">
                            {{ Str::limit(Auth::user()->name, 10) }}
                        </h1>
                        <h1 class="hidden text-sm font-semibold text-white xl:block lg:text-base whitespace-nowrap">
                            {{ Auth::user()->name }}
                        </h1>
                    </div>
                @endauth
            </div>

            <div class="justify-center flex-1 hidden max-w-xs md:flex">
                <form action="" method="POST" class="w-full font-[Poppins]">
                    <div class="relative">
                        <input type="text"
                               placeholder="Search menu..."
                               class="w-full px-4 py-2 pl-10 text-sm text-white border shadow-inner lg:text-base bg-zinc-900 rounded-xl border-zinc-800 focus:outline-none focus:ring-2 focus:ring-zinc-600 focus:border-transparent placeholder:text-zinc-600" />
                        <x-mdi-magnify class="absolute w-4 h-4 -translate-y-1/2 left-3 top-1/2 text-zinc-500" />
                    </div>
                </form>
            </div>

            <div class="flex items-center gap-4 sm:gap-3 lg:gap-4">
                <div class="items-center hidden gap-2 md:flex lg:gap-6">

                    <div class="flex items-center gap-2 pr-4 border-r border-zinc-800">
                        <button class="p-2 transition rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-900">
                            <x-mdi-bell class="w-5 h-5" />
                        </button>
                        <a href="{{ route('cart.index') }}"
                           class="p-2 transition rounded-lg text-zinc-400 hover:text-white hover:bg-zinc-900">
                            <x-mdi-cart class="w-5 h-5" />
                        </a>
                    </div>

                    <div class="flex items-center gap-5 font-[Poppins] text-sm lg:text-[15px]">
                        <a href="{{ route('main.index') }}" class="font-medium transition text-zinc-400 hover:text-white whitespace-nowrap">Home</a>
                        <a href="#" class="font-medium transition text-zinc-400 hover:text-white whitespace-nowrap">Shop</a>
                        <a href="{{ route('wishlist.index') }}" class="font-medium transition text-zinc-400 hover:text-white whitespace-nowrap">Wishlist</a>
                        <a href="{{ route('main.about') }}" class="font-medium transition text-zinc-400 hover:text-white whitespace-nowrap">About</a>

                        @auth
                            <div class="flex items-center gap-2 ml-2">
                                @if (auth()->user()->role == 'admin')
                                    <a href="{{ route('products.index') }}"
                                       class="flex items-center gap-1 px-3 py-1.5 text-xs font-semibold text-white transition bg-zinc-800 border border-zinc-700 hover:bg-zinc-700 rounded-lg whitespace-nowrap">
                                        <x-mdi-view-dashboard class="w-4 h-4" />
                                        Admin
                                    </a>
                                @endif

                                <form method="POST" action="{{ route('auth.logout') }}">
                                    @csrf
                                    <button class="text-black bg-white px-4 py-1.5 rounded-lg text-sm font-bold transition hover:bg-zinc-200 whitespace-nowrap flex items-center gap-1 shadow-md">
                                        <x-mdi-logout class="w-4 h-4" />
                                        Logout
                                    </button>
                                </form>
                            </div>
                        @endauth
                    </div>
                </div>

                <div class="flex items-center gap-3 md:hidden">
                    <button class="text-zinc-400 focus:outline-none">
                        <x-mdi-bell class="w-5 h-5" />
                    </button>
                    <a href="{{ route('cart.index') }}" class="text-zinc-400 focus:outline-none">
                        <x-mdi-cart class="w-5 h-5" />
                    </a>
                    <button id="menu-btn" class="p-1 text-white border rounded-md bg-zinc-900 focus:outline-none border-zinc-800">
                        <x-mdi-menu class="w-6 h-6" />
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="mobile-menu" class="md:hidden hidden bg-zinc-950 border-t border-zinc-900 font-[Poppins]">
        <div class="px-4 py-6 space-y-4">
            <div class="relative">
                <input type="text" placeholder="Search menu..."
                       class="w-full px-4 py-2 pl-10 text-sm text-white border rounded-lg bg-zinc-900 border-zinc-800 focus:outline-none focus:ring-2 focus:ring-zinc-600" />
                <x-mdi-magnify class="absolute w-4 h-4 -translate-y-1/2 left-3 top-1/2 text-zinc-500" />
            </div>

            <div class="space-y-1">
                <a href="{{ route('main.index') }}" class="flex items-center gap-3 px-3 py-3 transition text-zinc-400 hover:text-white rounded-xl hover:bg-zinc-900">
                    <x-mdi-home class="w-5 h-5" /> Home
                </a>
                <a href="#" class="flex items-center gap-3 px-3 py-3 transition text-zinc-400 hover:text-white rounded-xl hover:bg-zinc-900">
                    <x-mdi-storefront class="w-5 h-5" /> Shop
                </a>
                <a href="{{ route('wishlist.index') }}" class="flex items-center gap-3 px-3 py-3 transition text-zinc-400 hover:text-white rounded-xl hover:bg-zinc-900">
                    <x-mdi-heart class="w-5 h-5" /> Wishlist
                </a>
            </div>

            <div class="pt-4 space-y-3 border-t border-zinc-900">
                @auth
                    @if (auth()->user()->role == 'admin')
                        <a href="{{ route('products.index') }}"
                           class="flex items-center justify-center w-full gap-2 py-3 font-medium text-white transition border bg-zinc-800 border-zinc-700 rounded-xl">
                            <x-mdi-view-dashboard class="w-5 h-5" /> Dashboard Admin
                        </a>
                    @endif
                    <form method="POST" action="{{ route('auth.logout') }}" class="w-full">
                        @csrf
                        <button class="flex items-center justify-center w-full gap-2 py-3 font-bold text-black transition bg-white shadow-lg hover:bg-zinc-200 rounded-xl">
                            <x-mdi-logout class="w-5 h-5" /> Logout
                        </button>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>
