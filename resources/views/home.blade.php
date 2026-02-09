@extends('layouts.salon')

@section('title', 'Početna – ' . config('app.name'))

@section('content')
<!-- Hero -->
<section class="relative min-h-[85vh] flex items-center">
    <img src="https://images.unsplash.com/photo-1560066984-138dadb4c035?w=1920&q=80" alt="Hair salon" class="absolute inset-0 w-full h-full object-cover">
    <div class="absolute inset-0 bg-black/50"></div>
    <div class="relative z-10 w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 text-white">
        <h1 class="font-display text-5xl sm:text-6xl md:text-7xl font-bold mb-6 max-w-2xl leading-tight">
            Dobra kosa govori glasnije od riječi
        </h1>
        <p class="text-lg sm:text-xl text-gray-200 max-w-xl mb-10">
            Vrhunsko šišanje, farbanje i stiliziranje od strane iskusnih profesionalaca. Vaš najbolji izgled počinje ovdje.
        </p>
        <div class="flex flex-wrap gap-4">
            <a href="{{ route('services') }}" class="px-8 py-3 bg-pink-500 rounded-md hover:bg-pink-600 transition font-medium">
                Pogledajte usluge
            </a>
            <a href="{{ route('book') }}" class="px-8 py-3 border border-white/40 rounded-md hover:bg-white/10 transition font-medium">
                Rezervirajte termin
            </a>
        </div>
    </div>
</section>

<!-- Services preview -->
<section class="py-20 md:py-28 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-4">Naše usluge</h2>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16">Od preciznih krojeva do odvažnih boja i stilova za posebne prilike.</p>
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <a href="{{ route('services') }}" class="group overflow-hidden rounded-xl shadow-lg block">
                <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?w=800&q=80" alt="Haircuts" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6 bg-white">
                    <h3 class="font-display text-xl font-semibold mb-2 text-gray-900">Šišanje</h3>
                    <p class="text-gray-600">Šišanja po mjeri za svaki stil i ličnost.</p>
                </div>
            </a>
            <a href="{{ route('services') }}" class="group overflow-hidden rounded-xl shadow-lg block">
                <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=800&q=80" alt="Coloring" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6 bg-white">
                    <h3 class="font-display text-xl font-semibold mb-2 text-gray-900">Farbanje</h3>
                    <p class="text-gray-600">Vrhunska boja i pramenovi sa dugotrajnim, zdravim rezultatima.</p>
                </div>
            </a>
            <a href="{{ route('services') }}" class="group overflow-hidden rounded-xl shadow-lg block sm:col-span-2 lg:col-span-1">
                <img src="https://images.unsplash.com/photo-1605497788044-5a32c7078486?w=800&q=80" alt="Styling" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6 bg-white">
                    <h3 class="font-display text-xl font-semibold mb-2 text-gray-900">Uređivanje</h3>
                    <p class="text-gray-600">Izgledi za sve događaje, frizure sa feniranjem i podignute frizure koje su kreirali naši stilisti.</p>
                </div>
            </a>
        </div>
        <p class="text-center mt-10">
            <a href="{{ route('services') }}" class="text-pink-600 font-semibold hover:text-pink-700">Pogledajte sve usluge →</a>
        </p>
    </div>
</section>

<!-- About preview -->
<section class="py-20 md:py-28 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-gray-900 mb-6">O nama</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Mi smo salon fokusiran na kvalitet, udobnost i vaš lični stil. Naš tim ima dugogodišnje iskustvo i kontinuiranu edukaciju kako biste dobili najnovije tehnike.
                </p>
                <a href="{{ route('about') }}" class="text-pink-600 font-semibold hover:text-pink-700">Saznajte više o nama →</a>
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
        <h2 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-4">Naše radove</h2>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16">Neke od izgleda koje smo kreirali za naše klijente.</p>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <img src="https://tuzlanski.ba/wp-content/uploads/2015/03/Hairstyle-by-Senad-7.jpg" alt="Style 1" class="rounded-lg object-cover h-64 w-full shadow-md">
            <img src="https://images.unsplash.com/photo-1519699047748-de8e457a634e?w=600&q=80" alt="Style 2" class="rounded-lg object-cover h-64 w-full shadow-md">
            <img src="https://images.unsplash.com/photo-1521590832167-7bcbfaa6381f?w=600&q=80" alt="Style 3" class="rounded-lg object-cover h-64 w-full shadow-md">
            <img src="https://images.unsplash.com/photo-1487412947147-5cebf100ffc2?w=600&q=80" alt="Style 4" class="rounded-lg object-cover h-64 w-full shadow-md">
        </div>
        <p class="text-center mt-10">
            <a href="{{ route('our-work') }}" class="text-pink-600 font-semibold hover:text-pink-700">Pogledajte više naših radova →</a>
        </p>
    </div>
</section>

<!-- CTA -->
<section class="py-20 md:py-28 bg-pink-600 text-white text-center">
    <div class="max-w-3xl mx-auto px-4">
        <h2 class="font-display text-4xl md:text-5xl font-bold mb-4">Spremni za novi izgled?</h2>
        <p class="text-lg md:text-xl text-pink-100 mb-10">Zakažite svoj termin već danas i prepustite nama brigu o ostalom.</p>
        <a href="{{ route('book') }}" class="inline-block px-10 py-4 bg-white text-pink-600 font-semibold rounded-md hover:bg-gray-100 transition shadow-lg">
            Rezervišite odmah
        </a>
    </div>
</section>
@endsection
