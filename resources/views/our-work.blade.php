@extends('layouts.salon')

@section('title', 'Our Work – ' . config('app.name'))

@section('content')
<section class="pt-24 md:pt-12 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4">
        <!-- Heading -->
        <h1 class="font-display text-5xl md:text-5xl font-bold text-center text-gray-900 mt-10">
            Naš rad
        </h1>

        <!-- Subheading -->
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-12">
            Izbor izgleda koje smo kreirali za naše klijente. Pratite nas na društvenim mrežama za više informacija.
        </p>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
            <img src="https://images.unsplash.com/photo-1605497788044-5a32c7078486?w=600&q=80" alt="Style 1" class="rounded-xl object-cover h-64 md:h-80 w-full shadow-md hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?w=600&q=80" alt="Style 2" class="rounded-xl object-cover h-64 md:h-80 w-full shadow-md hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?w=600&q=80" alt="Style 3" class="rounded-xl object-cover h-64 md:h-80 w-full shadow-md hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?w=600&q=80" alt="Style 4" class="rounded-xl object-cover h-64 md:h-80 w-full shadow-md hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=600&q=80" alt="Color work" class="rounded-xl object-cover h-64 md:h-80 w-full shadow-md hover:shadow-lg transition">
            <img src="https://images.unsplash.com/photo-1605497788044-5a32c7078486?w=600&q=80" alt="Styling" class="rounded-xl object-cover h-64 md:h-80 w-full shadow-md hover:shadow-lg transition">
        </div>

        <!-- Call to Action -->
        <p class="text-center mt-12 text-gray-600">
            <a href="{{ route('contact') }}" class="text-pink-600 font-semibold hover:text-pink-700">Javite se</a> da razgovaramo o vašem sljedećem izgledu.
        </p>
    </div>
</section>
@endsection
