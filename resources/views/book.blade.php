@extends('layouts.salon')

@section('title', 'Book Appointment – ' . config('app.name'))

@section('content')
<section class="py-16 md:py-24">
    <div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="font-display text-4xl md:text-5xl font-bold text-center text-gray-900 mb-4">Book an Appointment</h1>
        <p class="text-center text-gray-600 mb-12">Choose a date and time that works for you. Sign in or register to manage your bookings.</p>

        @auth
            @if(auth()->user()->isClient())
                <div class="p-8 bg-gray-50 rounded-xl border border-gray-200 text-center">
                    <p class="text-gray-700 mb-6">You’re signed in. Go to your dashboard to request an appointment with a stylist.</p>
                    <a href="{{ route('client.dashboard') }}" class="inline-block px-8 py-3 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition">Go to my appointments</a>
                </div>
            @else
                <div class="p-8 bg-gray-50 rounded-xl border border-gray-200">
                    <p class="text-gray-700 mb-6">You’re signed in as {{ auth()->user()->isStylist() ? 'a stylist' : 'an admin' }}. Clients can book appointments from their dashboard after logging in.</p>
                    <p class="text-sm text-gray-500">Or call us at <strong>(555) 123-4567</strong> to book by phone.</p>
                </div>
            @endif
        @else
            <div class="p-8 bg-pink-50 rounded-xl border border-pink-100 text-center mb-10">
                <p class="text-gray-700 mb-6">To book online, please sign in or create an account. You can also call us or stop by the salon.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('login') }}" class="px-8 py-3 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition">Log in</a>
                    <a href="{{ route('register') }}" class="px-8 py-3 border-2 border-pink-500 text-pink-600 font-semibold rounded-md hover:bg-pink-50 transition">Register</a>
                </div>
                <p class="mt-6 text-sm text-gray-600">Or call <strong>(555) 123-4567</strong> to book by phone.</p>
            </div>
        @endauth
    </div>
</section>
@endsection
