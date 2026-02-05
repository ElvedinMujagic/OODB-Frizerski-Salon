@extends('layouts.salon')

@section('title', 'About – ' . config('app.name'))

@section('content')
<section class="pt-24 md:pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <!-- Text content -->
            <div>
                <h1 class="font-display text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    About Velvet
                </h1>

                <p class="text-gray-600 mb-4 leading-relaxed">
                    We’re a boutique salon focused on quality, comfort and your personal style. Our team brings years of experience and ongoing education so you get the latest techniques and finishes.
                </p>

                <p class="text-gray-600 mb-6 leading-relaxed">
                    Whether you’re in for a trim, a full color change or a special-occasion style, we’ll take the time to understand what you want and deliver a look you love.
                </p>

                <ul class="space-y-2 text-gray-700 mb-8">
                    <li class="flex items-center gap-2"><span class="text-pink-500 font-bold">✓</span> Licensed, experienced stylists</li>
                    <li class="flex items-center gap-2"><span class="text-pink-500 font-bold">✓</span> Premium products</li>
                    <li class="flex items-center gap-2"><span class="text-pink-500 font-bold">✓</span> Relaxed, welcoming environment</li>
                </ul>

                <a href="{{ route('book') }}" class="inline-block px-8 py-3 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition">
                    Book an appointment
                </a>
            </div>

            <!-- Image -->
            <div class="rounded-xl overflow-hidden shadow-xl order-first lg:order-none">
                <img src="https://images.unsplash.com/photo-1633681926022-84c23e8cb2d6?w=800&q=80" alt="Salon interior" class="w-full h-96 object-cover">
            </div>
        </div>
    </div>
</section>
@endsection
