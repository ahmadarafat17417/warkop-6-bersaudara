@extends('layouts.default')

@section('page_title', 'Register - Mie Ayam Bang Jack')

@section('body_style', 'relative')

@section('page_content')
<div class="relative flex items-center justify-center w-full min-h-screen p-4 bg-slate-950">
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none"></div>

    <div class="relative flex flex-col w-full max-w-md gap-4 p-8 border shadow-2xl h-fit rounded-3xl border-white/10 bg-zinc-900/80 backdrop-blur-xl">

        <div class="flex justify-center mb-2">
            <div class="relative">
                <div class="absolute inset-0 bg-white rounded-full opacity-20 blur-xl"></div>
                <img src="{{ asset('img/logo/logo.png') }}" class="relative object-contain h-24 brightness-110" alt="Logo">
            </div>
        </div>

        <div class="text-center">
            <h1 class="text-white text-2xl font-[Poppins] font-bold tracking-tight">Create Account</h1>
            <p class="mt-1 text-sm text-zinc-400">Join the community today</p>
        </div>

        <form method="POST" action="{{ route('auth.register') }}" class="flex flex-col gap-4 mt-2">
            @csrf

            <div class="group">
                <label class="text-zinc-300 font-[Poppins] text-xs font-semibold uppercase tracking-wider ml-1">Email Address</label>
                <input type="email" name="email"
                    class="bg-zinc-800/50 border border-zinc-700 text-white rounded-xl w-full py-2.5 px-4 mt-1.5 focus:outline-none focus:ring-2 focus:ring-zinc-500 focus:border-transparent transition-all placeholder:text-zinc-600"
                    placeholder="name@example.com">
            </div>

            <div class="group">
                <label class="text-zinc-300 font-[Poppins] text-xs font-semibold uppercase tracking-wider ml-1">Username</label>
                <input type="text" name="name"
                    class="bg-zinc-800/50 border border-zinc-700 text-white rounded-xl w-full py-2.5 px-4 mt-1.5 focus:outline-none focus:ring-2 focus:ring-zinc-500 focus:border-transparent transition-all placeholder:text-zinc-600"
                    placeholder="Your Username">
            </div>

            <div class="grid grid-cols-1 gap-3 md:grid-cols-2">
                <div class="group">
                    <label class="text-zinc-300 font-[Poppins] text-xs font-semibold uppercase tracking-wider ml-1">Password</label>
                    <input type="password" name="password"
                        class="bg-zinc-800/50 border border-zinc-700 text-white rounded-xl w-full py-2.5 px-4 mt-1.5 focus:outline-none focus:ring-2 focus:ring-zinc-500 focus:border-transparent transition-all placeholder:text-zinc-600"
                        placeholder="••••••••">
                </div>

                <div class="group">
                    <label class="text-zinc-300 font-[Poppins] text-xs font-semibold uppercase tracking-wider ml-1">Confirm</label>
                    <input type="password" name="password_confirmation"
                        class="bg-zinc-800/50 border border-zinc-700 text-white rounded-xl w-full py-2.5 px-4 mt-1.5 focus:outline-none focus:ring-2 focus:ring-zinc-500 focus:border-transparent transition-all placeholder:text-zinc-600"
                        placeholder="••••••••">
                </div>
            </div>

            <button type="submit"
                class="bg-white text-black font-[Poppins] font-bold text-center w-full mt-4 rounded-xl py-3 hover:bg-zinc-200 active:scale-[0.98] transition-all shadow-lg shadow-white/5">
                Register Now
            </button>

            @if ($errors->any())
                <div class="p-3 mt-2 border bg-red-900/20 border-red-500/50 rounded-xl">
                    <ul class="list-none">
                        @foreach ($errors->all() as $error)
                            <li class="text-[11px] text-red-400 font-medium flex items-center gap-1">
                                <span class="w-1 h-1 bg-red-500 rounded-full"></span> {{ $error }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

        <div class="pt-6 mt-4 text-center border-t border-zinc-800">
            <p class="text-sm text-zinc-500">
                Sudah memiliki akun?
                <a href="{{ route('show.login') }}" class="font-bold text-white transition-all hover:underline">Masuk</a>
            </p>
        </div>
    </div>
</div>
@endsection
