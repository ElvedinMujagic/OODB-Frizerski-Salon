@extends('layouts.salon')

@section('title', 'Services – ' . config('app.name'))

@section('content')
<section class="pt-24 md:pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-6">
            Naše usluge
        </h1>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16">
            Od preciznih rezova do odvažnih boja i stiliziranja za posebne prilike. Nudimo kompletan asortiman usluga koje odgovaraju vašem stilu.
        </p>

        <!-- Services grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="group overflow-hidden rounded-xl shadow-lg bg-white">
                <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?w=800&q=80" alt="Haircuts" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h2 class="font-display text-xl font-semibold mb-2 text-gray-900">Šišanja</h2>
                    <p class="text-gray-600 mb-4">Šišanja po mjeri za svaki stil i ličnost. Konsultacije su uključene kako bismo dobili izgled koji želite.</p>
                    <p class="text-sm text-gray-500">Ženski, muški i dječji krojevi • Preciznost i tekstura • Šiške</p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-xl shadow-lg bg-white">
                <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=800&q=80" alt="Coloring" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h2 class="font-display text-xl font-semibold mb-2 text-gray-900">Farbanje</h2>
                    <p class="text-gray-600 mb-4">Vrhunska boja i pramenovi sa dugotrajnim, zdravim rezultatima. Koristimo kvalitetne proizvode za zaštitu vaše kose.</p>
                    <p class="text-sm text-gray-500">Puna boja • Pramenovi • Korekcija boje • Sjaj i toniranje</p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-xl shadow-lg bg-white">
                <img src="https://images.unsplash.com/photo-1605497788044-5a32c7078486?w=800&q=80" alt="Styling" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h2 class="font-display text-xl font-semibold mb-2 text-gray-900">Uređivanje</h2>
                    <p class="text-gray-600 mb-4">Izgledi za sve događaje, frizure sa feniranjem i podignute frizure koje su kreirali naši stilisti. Savršeno za vjenčanja, zabave i posebne prilike.</p>
                    <p class="text-sm text-gray-500">Feniranje • Podignuta kosa • Pletenice • Stiliziranje</p>
                </div>
            </div>
        </div>

        <!-- Call to action -->
        <div class="mt-16 p-8 bg-gray-50 rounded-xl max-w-3xl mx-auto text-center">
            <p class="text-gray-700 mb-4">Spremni za rezervaciju? Odaberite uslugu, a mi ćemo se pobrinuti za ostalo.</p>
            <a href="{{ route('book') }}" class="inline-block px-8 py-3 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition">
                Rezervirajte termin
            </a>
        </div>
    </div>
</section>
@endsection
