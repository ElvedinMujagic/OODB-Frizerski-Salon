@extends('layouts.salon')

@section('title', 'Contact – ' . config('app.name'))

@section('content')
<section class="pt-24 md:pt-32 pb-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-6">
            Contact Us
        </h1>
        <p class="text-center text-gray-600 max-w-2xl mx-auto mb-16">
            Stop by, call or send a message. We’d love to hear from you.
        </p>

        <!-- Contact cards -->
        <div class="grid md:grid-cols-3 gap-8 max-w-4xl mx-auto mb-16">
            <div class="p-6 text-center bg-gray-50 rounded-xl">
                <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <h2 class="font-semibold text-gray-900 mb-2">Address</h2>
                <p class="text-gray-600">123 Main Street<br>Your City, ST 12345</p>
            </div>
            <div class="p-6 text-center bg-gray-50 rounded-xl">
                <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                    </svg>
                </div>
                <h2 class="font-semibold text-gray-900 mb-2">Phone</h2>
                <p class="text-gray-600">(555) 123-4567</p>
            </div>
            <div class="p-6 text-center bg-gray-50 rounded-xl">
                <div class="w-12 h-12 rounded-full bg-pink-100 flex items-center justify-center mx-auto mb-4">
                    <svg class="w-6 h-6 text-pink-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <h2 class="font-semibold text-gray-900 mb-2">Hours</h2>
                <p class="text-gray-600">Tue–Sat 9am–7pm<br>Sun–Mon Closed</p>
            </div>
        </div>
    </div>
</section>
@endsection
