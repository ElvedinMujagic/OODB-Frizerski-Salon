@extends('layouts.salon')

@section('title', 'Services – ' . config('app.name'))

@section('content')
<section class="pt-24 md:pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-6">
            Our Services
        </h1>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16">
            From precision cuts to bold color and special-occasion styling. We offer a full range of services to match your style.
        </p>

        <!-- Services grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <div class="group overflow-hidden rounded-xl shadow-lg bg-white">
                <img src="https://images.unsplash.com/photo-1503951914875-452162b0f3f1?w=800&q=80" alt="Haircuts" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h2 class="font-display text-xl font-semibold mb-2 text-gray-900">Haircuts</h2>
                    <p class="text-gray-600 mb-4">Tailored cuts for every style and personality. Consultations included so we get the look you want.</p>
                    <p class="text-sm text-gray-500">Women’s, men’s and children’s cuts • Precision & texture • Bang trims</p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-xl shadow-lg bg-white">
                <img src="https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=800&q=80" alt="Coloring" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h2 class="font-display text-xl font-semibold mb-2 text-gray-900">Coloring</h2>
                    <p class="text-gray-600 mb-4">Premium color and highlights with long-lasting, healthy results. We use quality products to protect your hair.</p>
                    <p class="text-sm text-gray-500">Full color • Highlights & balayage • Color correction • Gloss & toning</p>
                </div>
            </div>

            <div class="group overflow-hidden rounded-xl shadow-lg bg-white">
                <img src="https://images.unsplash.com/photo-1605497788044-5a32c7078486?w=800&q=80" alt="Styling" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                <div class="p-6">
                    <h2 class="font-display text-xl font-semibold mb-2 text-gray-900">Styling</h2>
                    <p class="text-gray-600 mb-4">Event-ready looks, blowouts and updos crafted by our stylists. Perfect for weddings, parties and special occasions.</p>
                    <p class="text-sm text-gray-500">Blowouts • Updos • Braids • Special occasion styling</p>
                </div>
            </div>
        </div>

        <!-- Call to action -->
        <div class="mt-16 p-8 bg-gray-50 rounded-xl max-w-3xl mx-auto text-center">
            <p class="text-gray-700 mb-4">Ready to book? Choose a service and we’ll take care of the rest.</p>
            <a href="{{ route('book') }}" class="inline-block px-8 py-3 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition">
                Book Appointment
            </a>
        </div>
    </div>
</section>
@endsection
