<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Velvet Hair Studio') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=cormorant-garamond:400,500,600,700|inter:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body { font-family: 'Inter', sans-serif; }
        .font-display { font-family: 'Cormorant Garamond', serif; }
    </style>
</head>
<body class="bg-white text-gray-800 antialiased">

<!-- NAVBAR -->
<header id="navbar" class="fixed top-0 left-0 w-full z-50 transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16 md:h-20">
            <a href="{{ url('/') }}" class="text-2xl font-display font-bold tracking-wide hover:text-pink-200 transition">
                Velvet<span class="text-pink-400">.</span>
            </a>

            <!-- Desktop nav -->
            <nav class="hidden lg:flex items-center gap-8 text-white">
                <a href="{{ url('/') }}" class="hover:text-pink-300 transition font-medium">Home</a>
                <a href="#services" class="hover:text-pink-300 transition font-medium">Services</a>
                <a href="#gallery" class="hover:text-pink-300 transition font-medium">Our Work</a>
                <a href="#about" class="hover:text-pink-300 transition font-medium">About</a>
                <a href="#contact" class="hover:text-pink-300 transition font-medium">Contact</a>
                <a href="#book" class="px-4 py-2 rounded-md bg-pink-500/90 hover:bg-pink-500 transition font-medium">Book Appointment</a>
            </nav>

            <!-- Mobile menu button -->
            <div class="flex items-center gap-3 lg:hidden">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-white text-sm font-medium px-3 py-1.5">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-white text-sm font-medium">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-white text-sm font-medium px-3 py-1.5 bg-pink-500 rounded">Register</a>
                        @endif
                    @endauth
                @endif
                <label for="mobile-menu" class="cursor-pointer p-2 text-white hover:text-pink-300 lg:hidden" aria-label="Toggle menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
                </label>
            </div>
        </div>
    </div>

    <!-- Mobile dropdown -->
    <input type="checkbox" id="mobile-menu" class="peer hidden">
    <div class="hidden peer-checked:block lg:hidden bg-gray-900/98 border-t border-white/10">
        <nav class="max-w-7xl mx-auto px-4 py-4 flex flex-col gap-2 text-white">
            <a href="{{ url('/') }}" class="py-2 hover:text-pink-300">Home</a>
            <a href="#services" class="py-2 hover:text-pink-300">Services</a>
            <a href="#gallery" class="py-2 hover:text-pink-300">Our Work</a>
            <a href="#about" class="py-2 hover:text-pink-300">About</a>
            <a href="#contact" class="py-2 hover:text-pink-300">Contact</a>
            <a href="#book" class="py-2 text-pink-400 font-medium">Book Appointment</a>
        </nav>
    </div>
</header>

<!-- Hero -->
<section class="relative min-h-screen flex items-center pt-32 md:pt-40 pb-16">
    <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?w=1920&q=80" alt="Hair salon" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-white">
        <h1 class="font-display text-5xl sm:text-6xl md:text-7xl font-bold mb-6 max-w-2xl leading-tight">
            Hair that speaks before you do
        </h1>
        <p class="text-lg sm:text-xl text-gray-200 max-w-xl mb-10">
            Premium haircuts, coloring and styling by experienced professionals. Your best look starts here.
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="#services" class="px-8 py-3 bg-pink-500 rounded-md hover:bg-pink-600 transition font-medium">
                View Services
            </a>
            <a href="#book" class="px-8 py-3 border border-white/40 rounded-md hover:bg-white/10 transition font-medium">
                Book Appointment
            </a>
        </div>
    </div>
</section>

<!-- Services -->
<section id="services" class="py-20 md:py-28 scroll-mt-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-6">Our Services</h2>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16">From precision cuts to bold color and special-occasion styling.</p>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="group overflow-hidden rounded-xl shadow-lg">
                <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?w=800&q=80" alt="Haircuts" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6 bg-white">
                    <h3 class="font-display text-xl font-semibold mb-2 text-gray-900">Haircuts</h3>
                    <p class="text-gray-600">Tailored cuts for every style and personality. Consultations included.</p>
                </div>
            </div>
            <div class="group overflow-hidden rounded-xl shadow-lg">
                <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=800&q=80" alt="Coloring" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6 bg-white">
                    <h3 class="font-display text-xl font-semibold mb-2 text-gray-900">Coloring</h3>
                    <p class="text-gray-600">Premium color and highlights with long-lasting, healthy results.</p>
                </div>
            </div>
            <div class="group overflow-hidden rounded-xl shadow-lg sm:col-span-2 lg:col-span-1">
                <img src="https://images.unsplash.com/photo-1605497788044-5a32c7078486?w=800&q=80" alt="Styling" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6 bg-white">
                    <h3 class="font-display text-xl font-semibold mb-2 text-gray-900">Styling</h3>
                    <p class="text-gray-600">Event-ready looks, blowouts and updos crafted by our stylists.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section id="about" class="py-20 md:py-28 bg-gray-50 scroll-mt-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-gray-900 mb-6">About Velvet</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    We’re a boutique salon focused on quality, comfort and your personal style. Our team brings years of experience and ongoing education so you get the latest techniques and finishes.
                </p>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Whether you’re in for a trim, a full color change or a special-occasion style, we’ll take the time to understand what you want and deliver a look you love.
                </p>
                <ul class="space-y-2 text-gray-700">
                    <li class="flex items-center gap-2"><span class="text-pink-500">✓</span> Licensed, experienced stylists</li>
                    <li class="flex items-center gap-2"><span class="text-pink-500">✓</span> Premium products</li>
                    <li class="flex items-center gap-2"><span class="text-pink-500">✓</span> Relaxed, welcoming environment</li>
                </ul>
            </div>
            <div class="rounded-xl overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1633681926022-84c23e8cb2d6?w=800&q=80" alt="Salon interior" class="w-full h-96 object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Gallery -->
<section id="gallery" class="py-20 md:py-28 scroll-mt-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-6">Our Work</h2>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16">Some of the looks we’ve created for our clients.</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <img src="https://images.unsplash.com/photo-1595476108010-b4d1f769b0b8?w=600&q=80" alt="Style 1" class="rounded-lg object-cover h-64 w-full shadow-md">
            <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?w=600&q=80" alt="Style 2" class="rounded-lg object-cover h-64 w-full shadow-md">
            <img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?w=600&q=80" alt="Style 3" class="rounded-lg object-cover h-64 w-full shadow-md">
            <img src="https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?w=600&q=80" alt="Style 4" class="rounded-lg object-cover h-64 w-full shadow-md">
        </div>
    </div>
</section>

<!-- Contact -->
<section id="contact" class="py-20 md:py-28 bg-gray-50 scroll-mt-28">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-6">Contact Us</h2>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16">Stop by, call or send a message. We’d love to hear from you.</p>
        <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto text-center">
            <div class="p-6">
                <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Address</h3>
                <p class="text-gray-600">123 Main Street<br>Your City, ST 12345</p>
            </div>
            <div class="p-6">
                <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Phone</h3>
                <p class="text-gray-600">(555) 123-4567</p>
            </div>
            <div class="p-6">
                <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <h3 class="font-semibold text-gray-900 mb-2">Hours</h3>
                <p class="text-gray-600">Tue–Sat 9am–7pm<br>Sun–Mon Closed</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA / Book -->
<section id="book" class="py-20 md:py-28 bg-pink-600 text-white text-center scroll-mt-28">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="font-display text-4xl md:text-5xl font-bold mb-4">Ready for a new look?</h2>
        <p class="text-lg md:text-xl text-pink-100 mb-10">Book your appointment today and let us take care of the rest.</p>
        <a href="{{ route('login') }}" class="inline-block px-10 py-4 bg-white text-pink-600 font-semibold rounded-md hover:bg-gray-100 transition shadow-lg">
            Book Now
        </a>
    </div>
</section>

<!-- Footer -->
<footer class="bg-gray-900 text-gray-400 py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid md:grid-cols-4 gap-8 mb-8">
            <div class="md:col-span-2">
                <a href="{{ url('/') }}" class="text-2xl font-display font-bold text-white">Velvet<span class="text-pink-400">.</span></a>
                <p class="mt-3 text-sm max-w-sm">Premium hair cuts, color and styling in a welcoming, professional environment.</p>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-3">Quick links</h4>
                <ul class="space-y-2 text-sm">
                    <li><a href="#services" class="hover:text-pink-400 transition">Services</a></li>
                    <li><a href="#gallery" class="hover:text-pink-400 transition">Our Work</a></li>
                    <li><a href="#about" class="hover:text-pink-400 transition">About</a></li>
                    <li><a href="#contact" class="hover:text-pink-400 transition">Contact</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-semibold text-white mb-3">Connect</h4>
                <div class="flex gap-4">
                    <a href="#" class="text-gray-400 hover:text-pink-400 transition" aria-label="Facebook">Facebook</a>
                    <a href="#" class="text-gray-400 hover:text-pink-400 transition" aria-label="Instagram">Instagram</a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 pt-8 text-sm text-center">
            © {{ date('Y') }} Velvet Hair Studio. All rights reserved.
        </div>
    </div>
</footer>

<script>
    (function() {
        var nav = document.getElementById('navbar');
        if (!nav) return;
        function updateNav() {
            if (window.scrollY > 60) {
                nav.classList.add('bg-gray-900/95', 'shadow-lg');
            } else {
                nav.classList.remove('bg-gray-900/95', 'shadow-lg');
            }
        }
        window.addEventListener('scroll', updateNav);
        updateNav();
        document.querySelectorAll('a[href^="#"]').forEach(function(a) {
            a.addEventListener('click', function() {
                document.getElementById('mobile-menu').checked = false;
            });
        });
    })();
</script>
</body>
</html>
