@extends('layouts.salon')

@section('title', 'O nama – ' . config('app.name'))

@section('content')
<section class="pt-24 md:pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 lg:gap-16 items-center">
            <div>
                <h1 class="font-display text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                    O nama
                </h1>

                <p class="text-gray-600 mb-4 leading-relaxed">
                    Mi smo  salon fokusiran na kvalitet, udobnost i vaš lični stil. Naš tim ima dugogodišnje iskustvo i kontinuiranu edukaciju kako biste dobili najnovije tehnike i završne obrade.</p>

                <p class="text-gray-600 mb-6 leading-relaxed">
                    Bez obzira da li želite šišanje, potpunu promjenu boje ili stil za posebnu priliku, mi ćemo odvojiti vrijeme da razumijemo šta želite i pružimo vam izgled koji volite.</p>

                <ul class="space-y-2 text-gray-700 mb-8">
                    <li class="flex items-center gap-2"><span class="text-pink-500 font-bold">✓</span> Licencirani, iskusni frizeri</li>
                    <li class="flex items-center gap-2"><span class="text-pink-500 font-bold">✓</span> Premium proizvodi</li>
                    <li class="flex items-center gap-2"><span class="text-pink-500 font-bold">✓</span> Opuštena, gostoljubiva atmosfera</li>
                </ul>

                <a href="{{ route('book') }}" class="inline-block px-8 py-3 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition">
                    Zakažite termin
                </a>
            </div>

            <div class="rounded-xl overflow-hidden shadow-xl order-first lg:order-none">
                <img src="https://images.unsplash.com/photo-1633681926022-84c23e8cb2d6?w=800&q=80" alt="Salon interior" class="w-full h-96 object-cover">
            </div>
        </div>
    </div>
</section>
@endsection
