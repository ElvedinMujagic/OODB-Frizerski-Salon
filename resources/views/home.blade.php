@extends('layouts.salon')

@section('title', 'Home – ' . config('app.name'))

@section('content')
<!-- Hero -->
<section class="relative min-h-[85vh] flex items-center">
    <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?w=1920&q=80" alt="Hair salon" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-white">
        <h1 class="font-display text-5xl sm:text-6xl md:text-7xl font-bold mb-6 max-w-2xl leading-tight">
            Hair that speaks before you do
        </h1>
        <p class="text-lg sm:text-xl text-gray-200 max-w-xl mb-10">
            Premium haircuts, coloring and styling by experienced professionals. Your best look starts here.
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('services') }}" class="px-8 py-3 bg-pink-500 rounded-md hover:bg-pink-600 transition font-medium">
                View Services
            </a>
            <a href="{{ route('book') }}" class="px-8 py-3 border border-white/40 rounded-md hover:bg-white/10 transition font-medium">
                Book Appointment
            </a>
        </div>
    </div>
</section>

<!-- Services preview -->
<section class="py-20 md:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-4">Our Services</h2>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16">From precision cuts to bold color and special-occasion styling.</p>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <a href="{{ route('services') }}" class="group overflow-hidden rounded-xl shadow-lg block">
                <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?w=800&q=80" alt="Haircuts" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6 bg-white">
                    <h3 class="font-display text-xl font-semibold mb-2 text-gray-900">Haircuts</h3>
                    <p class="text-gray-600">Tailored cuts for every style and personality.</p>
                </div>
            </a>
            <a href="{{ route('services') }}" class="group overflow-hidden rounded-xl shadow-lg block">
                <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=800&q=80" alt="Coloring" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6 bg-white">
                    <h3 class="font-display text-xl font-semibold mb-2 text-gray-900">Coloring</h3>
                    <p class="text-gray-600">Premium color and highlights with long-lasting results.</p>
                </div>
            </a>
            <a href="{{ route('services') }}" class="group overflow-hidden rounded-xl shadow-lg block sm:col-span-2 lg:col-span-1">
                <img src="https://images.unsplash.com/photo-1605497788044-5a32c7078486?w=800&q=80" alt="Styling" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6 bg-white">
                    <h3 class="font-display text-xl font-semibold mb-2 text-gray-900">Styling</h3>
                    <p class="text-gray-600">Event-ready looks and blowouts by our stylists.</p>
                </div>
            </a>
        </div>
        <p class="text-center mt-10">
            <a href="{{ route('services') }}" class="text-pink-600 font-semibold hover:text-pink-700">View all services →</a>
        </p>
    </div>
</section>

<!-- About preview -->
<section class="py-20 md:py-28 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-gray-900 mb-6">About Velvet</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    We’re a boutique salon focused on quality, comfort and your personal style. Our team brings years of experience and ongoing education so you get the latest techniques and finishes.
                </p>
                <a href="{{ route('about') }}" class="text-pink-600 font-semibold hover:text-pink-700">Learn more about us →</a>
            </div>
            <div class="rounded-xl overflow-hidden shadow-xl">
                <img src="https://images.unsplash.com/photo-1633681926022-84c23e8cb2d6?w=800&q=80" alt="Salon interior" class="w-full h-96 object-cover">
            </div>
        </div>
    </div>
</section>

<!-- Gallery preview -->
<section class="py-20 md:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-4">Our Work</h2>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16">Some of the looks we’ve created for our clients.</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <img src="https://images.unsplash.com/photo-1595476108010-b4d1f769b0b8?w=600&q=80" alt="Style 1" class="rounded-lg object-cover h-64 w-full shadow-md">
            <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?w=600&q=80" alt="Style 2" class="rounded-lg object-cover h-64 w-full shadow-md">
            <img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?w=600&q=80" alt="Style 3" class="rounded-lg object-cover h-64 w-full shadow-md">
            <img src="https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?w=600&q=80" alt="Style 4" class="rounded-lg object-cover h-64 w-full shadow-md">
        </div>
        <p class="text-center mt-10">
            <a href="{{ route('our-work') }}" class="text-pink-600 font-semibold hover:text-pink-700">See more of our work →</a>
        </p>
    </div>
</section>

<!-- CTA -->
<section class="py-20 md:py-28 bg-pink-600 text-white text-center">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="font-display text-4xl md:text-5xl font-bold mb-4">Ready for a new look?</h2>
        <p class="text-lg md:text-xl text-pink-100 mb-10">Book your appointment today and let us take care of the rest.</p>
        <a href="{{ route('book') }}" class="inline-block px-10 py-4 bg-white text-pink-600 font-semibold rounded-md hover:bg-gray-100 transition shadow-lg">
            Book Now
        </a>
    </div>
</section>
@endsection
