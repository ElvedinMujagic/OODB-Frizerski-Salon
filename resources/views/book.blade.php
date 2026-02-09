@extends('layouts.salon')

@section('title', 'Zakažite termin – ' . config('app.name'))

@section('content')
<section class="py-16 md:py-24">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-4">Zakažite termin</h1>
        <p class="text-center text-gray-600 mb-12">Odaberite datum i vrijeme koje vam odgovara. Prijavite se ili registrujte da biste upravljali svojim rezervacijama.</p>
        <div class="p-8 bg-blue-50 rounded-xl border border-blue-100 text-center mb-10">
            <p class="text-gray-700 mb-6">Za rezervaciju online, molimo vas da se prijavite ili kreirate račun. Također nas možete pozvati ili posjetiti salon.</p>
            <div class="flex flex-wrap justify-center gap-4">
                <a href="{{ route('login') }}" class="px-8 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition">Prijavi se</a>
                <a href="{{ route('register') }}" class="px-8 py-3 border-2 border-blue-500 text-blue-600 font-semibold rounded-md hover:bg-blue-50 transition">Registriraj se</a>
            </div>
            <p class="mt-6 text-sm text-gray-600">Ili nazovite <strong>(555) 123-4567</strong> za rezervaciju telefonom.</p>
        </div>
    </div>
</section>
@endsection
