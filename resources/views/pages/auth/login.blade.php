@extends('layouts.default')

@section('page_title', 'Welcome Back - Login')

@section('body_style', 'relative')

@section('page_content')
<div class="relative min-h-screen bg-slate-950">
    <div class="absolute inset-0 bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px] pointer-events-none"></div>

    <div class="absolute top-0 left-0 rounded-full bg-slate-500 w-72 h-72 mix-blend-screen filter blur-3xl opacity-10 animate-blob"></div>
    <div class="absolute top-0 right-0 rounded-full bg-zinc-600 w-72 h-72 mix-blend-screen filter blur-3xl opacity-10 animate-blob animation-delay-2000"></div>
    <div class="absolute bottom-0 rounded-full left-20 w-72 h-72 bg-slate-700 mix-blend-screen filter blur-3xl opacity-10 animate-blob animation-delay-4000"></div>

    <div class="relative flex items-center justify-center w-full min-h-screen p-4">
        <div class="relative w-full max-w-md">
            <div class="p-8 border shadow-2xl backdrop-blur-2xl bg-zinc-900/80 rounded-3xl border-white/10">

                <div class="flex justify-center mb-6 transition-transform duration-300 transform hover:scale-105">
                    <div class="relative">
                        <div class="absolute inset-0 bg-white rounded-full opacity-30 blur-xl"></div>
                        <img src="{{ asset('img/logo/logo.png') }}" class="relative object-contain h-32 brightness-110" alt="Logo">
                    </div>
                </div>

                <div class="mb-8 text-center">
                    <h1 class="text-3xl font-bold tracking-tight text-white font-poppins">
                        Sign In
                    </h1>
                    <p class="mt-2 text-sm text-zinc-400">Access your dashboard</p>
                </div>

                <form method="POST" action="{{ route('auth.login') }}" class="space-y-5">
                    @csrf

                    <div class="relative group">
                        <input type="email" name="email" id="email"
                               class="w-full px-4 py-3 text-white transition-all border-2 outline-none bg-zinc-800/50 border-zinc-700 peer rounded-xl focus:border-zinc-400 focus:ring-2 focus:ring-zinc-600"
                               placeholder=" " />
                        <label for="email"
                               class="absolute left-4 -top-2.5 bg-zinc-900 px-2 text-sm font-medium text-zinc-400 transition-all
                                      peer-placeholder-shown:text-base peer-placeholder-shown:text-zinc-500 peer-placeholder-shown:top-3 peer-placeholder-shown:bg-transparent
                                      peer-focus:-top-2.5 peer-focus:text-sm peer-focus:font-medium peer-focus:text-white peer-focus:bg-zinc-900">
                            Email Address
                        </label>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none text-zinc-500 group-focus-within:text-white">
                            <x-mdi-email class="w-5 h-5" />
                        </div>
                    </div>

                    <div class="relative group">
                        <input type="password" name="password" id="password"
                               class="w-full px-4 py-3 text-white transition-all border-2 outline-none bg-zinc-800/50 border-zinc-700 peer rounded-xl focus:border-zinc-400 focus:ring-2 focus:ring-zinc-600"
                               placeholder=" " />
                        <label for="password"
                               class="absolute left-4 -top-2.5 bg-zinc-900 px-2 text-sm font-medium text-zinc-400 transition-all
                                      peer-placeholder-shown:text-base peer-placeholder-shown:text-zinc-500 peer-placeholder-shown:top-3 peer-placeholder-shown:bg-transparent
                                      peer-focus:-top-2.5 peer-focus:text-sm peer-focus:font-medium peer-focus:text-white peer-focus:bg-zinc-900">
                            Password
                        </label>
                        <div class="absolute inset-y-0 right-0 flex items-center pr-3">
                            <button type="button" onclick="togglePassword()" class="text-zinc-500 hover:text-white focus:outline-none">
                                <x-mdi-eye id="pw-icon" class="w-5 h-5" />
                            </button>
                        </div>
                    </div>

                    <button type="submit"
                            class="group w-full py-3 px-4 bg-white text-black font-bold rounded-xl
                                   hover:bg-zinc-200 focus:ring-4 focus:ring-zinc-500
                                   transform transition-all duration-200 hover:scale-[1.02] active:scale-[0.98]
                                   shadow-lg shadow-white/5">
                        <span class="flex items-center justify-center gap-2">
                            Sign In
                            <x-mdi-login class="w-5 h-5 transition-transform group-hover:translate-x-1" />
                        </span>
                    </button>

                    @if ($errors->any())
                        <div class="p-4 mt-4 border-l-4 border-red-500 bg-red-950/30 rounded-r-xl animate-shake">
                            <div class="flex items-start gap-3">
                                <x-mdi-alert-circle class="w-5 h-5 text-red-500 mt-0.5" />
                                <ul class="list-none">
                                    @foreach ($errors->all() as $error)
                                        <li class="text-sm font-medium text-red-400">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif
                </form>

                <div class="pt-6 mt-8 text-center border-t border-zinc-800">
                    <p class="text-zinc-500">
                        Belum punya akun?
                        <a href="{{ route('show.register') }}" class="inline-flex items-center gap-1 font-semibold text-white transition-colors hover:underline">
                            Daftar
                            <x-mdi-account-plus class="w-4 h-4" />
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function togglePassword() {
    const passwordInput = document.getElementById('password');
    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordInput.setAttribute('type', type);
}
</script>

<style>
@keyframes blob {
    0% { transform: translate(0px, 0px) scale(1); }
    33% { transform: translate(30px, -50px) scale(1.1); }
    66% { transform: translate(-20px, 20px) scale(0.9); }
    100% { transform: translate(0px, 0px) scale(1); }
}
.animate-blob { animation: blob 7s infinite; }
.animation-delay-2000 { animation-delay: 2s; }
.animation-delay-4000 { animation-delay: 4s; }

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    10%, 30%, 50%, 70%, 90% { transform: translateX(-2px); }
    20%, 40%, 60%, 80% { transform: translateX(2px); }
}
.animate-shake { animation: shake 0.5s ease-in-out; }
</style>
@endsection
