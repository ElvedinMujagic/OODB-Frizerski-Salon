<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Velvet Hair Studio'))</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|inter:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Cormorant Garamond', serif; }
    </style>
    @stack('styles')
</head>
<body class="bg-white text-gray-800 antialiased">

<!-- NAVBAR: dark background so text is always visible; auth group never shrinks -->
<header id="navbar" class="fixed top-0 left-0 w-full z-50 bg-gray-900 shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-20 gap-4">
            <a href="{{ route('home') }}" class="text-2xl font-display font-bold tracking-wide text-white hover:text-blue-200 transition flex-shrink-0">
                Velvet<span class="text-blue-400">.</span>
            </a>

            <!-- Desktop: main nav + auth group (auth group flex-shrink-0 so Login/Register always visible) -->
            <nav class="hidden lg:flex items-center flex-1 min-w-0 justify-end xl:justify-center xl:gap-8 gap-4">
                <a href="{{ route('home') }}" class="text-white hover:text-blue-300 transition font-medium whitespace-nowrap">Početna</a>
                <a href="{{ route('services') }}" class="text-white hover:text-blue-300 transition font-medium whitespace-nowrap">Naše usluge</a>
                <a href="{{ route('our-work') }}" class="text-white hover:text-blue-300 transition font-medium whitespace-nowrap">Naš rad</a>
                <a href="{{ route('about') }}" class="text-white hover:text-blue-300 transition font-medium whitespace-nowrap">O nama</a>
                <a href="{{ route('contact') }}" class="text-white hover:text-blue-300 transition font-medium whitespace-nowrap">Kontakt</a>
                <a href="{{ route('book') }}" class="text-white px-4 py-2 rounded-md bg-blue-500/90 hover:bg-blue-500 transition font-medium whitespace-nowrap">Zakaži termin</a>
            </nav>

            <!-- Auth: always on the right, never shrinks -->
            <div class="hidden lg:flex items-center gap-3 flex-shrink-0 ml-0 xl:ml-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white px-4 py-2 border border-white/40 rounded-md hover:bg-white/10 transition font-medium">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white hover:text-blue-300 transition font-medium">Prijavi se</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white px-4 py-2 bg-blue-500 rounded-md hover:bg-blue-600 transition font-medium">Registruj se</a>
                        @endif
                    @endauth
                @endif
            </div>

            <!-- Mobile: hamburger + Login/Register always visible -->
            <div class="flex items-center gap-2 lg:hidden flex-shrink-0">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white text-sm font-medium px-3 py-1.5">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white text-sm font-medium">Prijavi se</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white text-sm font-medium px-3 py-1.5 bg-blue-500 rounded">Registruj se</a>
                        @endif
                    @endauth
                @endif
                <label for="mobile-menu" class="cursor-pointer p-2 text-white hover:text-blue-300" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </label>
            </div>
        </div>
    </div>

    <input type="checkbox" id="mobile-menu" class="peer hidden">
    <div class="hidden peer-checked:block lg:hidden bg-gray-800 border-t border-white/10">
        <nav class="max-w-7xl mx-auto px-4 py-4 flex flex-col gap-2 text-white">
            <a href="{{ route('home') }}" class="py-2 hover:text-blue-300">Početna</a>
            <a href="{{ route('services') }}" class="py-2 hover:text-blue-300">Usluge</a>
            <a href="{{ route('our-work') }}" class="py-2 hover:text-blue-300">Naš rad</a>
            <a href="{{ route('about') }}" class="py-2 hover:text-blue-300">O nama</a>
            <a href="{{ route('contact') }}" class="py-2 hover:text-blue-300">Kontakt</a>
            <a href="{{ route('book') }}" class="py-2 text-blue-400 font-medium">Zakaži termin</a>
        </nav>
    </div>
</header>

<main>
    @yield('content')
</main>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-400 py-12 mt-auto">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div class="md:col-span-2">
                <a href="{{ route('home') }}" class="text-2xl font-display font-bold text-white">Velvet<span class="text-blue-400">.</span></a>
                <p class="mt-3 text-sm max-w-sm">Vrhunsko šišanje, farbanje i stiliziranje kose u ugodnom i profesionalnom okruženju.</p>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-3">Linkovi</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="{{ route('services') }}" class="hover:text-blue-400 transition">Naše usluge</a></li>
                    <li><a href="{{ route('our-work') }}" class="hover:text-blue-400 transition">Naš rad</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-blue-400 transition">O nama</a></li>
                    <li><a href="{{ route('contact') }}" class="hover:text-blue-400 transition">Kontakt</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-3">Pratite nas</h4>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition" aria-label="Facebook">Facebook</a>
                    <a href="#" class="text-gray-400 hover:text-blue-400 transition" aria-label="Instagram">Instagram</a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-8 text-sm text-center">
            © {{ date('Y') }} Frizerski salon Velvet. All rights reserved.
        </div>
    </div>
</footer>

<script>
    document.querySelectorAll('a[href^="#"]').forEach(function(a) {
        var id = a.getAttribute('href');
        if (id && id !== '#' && document.getElementById(id.slice(1))) {
            a.addEventListener('click', function() {
                var el = document.getElementById('mobile-menu');
                if (el) el.checked = false;
            });
        }
    });
</script>
@stack('scripts')
</body>
</html>
