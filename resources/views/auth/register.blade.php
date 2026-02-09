<x-guest-layout>
    <x-authentication-card>
        
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Ime') }}" />
                <x-input id="name" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-200" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="name" value="{{ __('Prezime') }}" />
                <x-input id="name" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-200" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-200" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Lozinka') }}" />
                <x-input id="password" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-200" type="password" name="password" required autocomplete="new-password" />
            </div>
        
            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Potvrdi lozinku') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-500 focus:ring-opacity-200" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500" href="{{ route('login') }}">
                    {{ __('Već ste registrovani? Prijavite se!') }}
                </a>

                <x-button class="ms-4 bg-blue-500 hover:bg-blue-600 text-white">
                    {{ __('Registriraj se') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
