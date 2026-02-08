<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('admin.stylists.delete') }}" class="text-gray-500 hover:text-gray-700 text-sm">← Frizeri</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Uredi frizera') }}: {{ $stylist->name }} {{ $stylist->lastname }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 max-w-xl">
                <div class="p-6 lg:p-8">
                    <p class="text-gray-600 mb-6">Izmijenite podatke frizera i radno vrijeme.</p>
                    <form action="{{ route('admin.stylists.update', $stylist->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Ime</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $stylist->name) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="lastname" class="block text-sm font-medium text-gray-700 mb-1">Prezime</label>
                            <input type="text" name="lastname" id="lastname" value="{{ old('lastname', $stylist->lastname) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            @error('lastname')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email', $stylist->email) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Nova lozinka (ostavite prazno da ne mijenjate)</label>
                            <input type="password" name="password" id="password" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Potvrdi novu lozinku</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                        </div>
                        @php
                            $wh = $stylist->workHours;
                            $startVal = old('start_time', $wh ? \Carbon\Carbon::parse($wh->start_time)->format('H:i') : '08:00');
                            $endVal = old('end_time', $wh ? \Carbon\Carbon::parse($wh->end_time)->format('H:i') : '16:00');
                        @endphp
                        <div>
                            <label for="start_time" class="block text-sm font-medium text-gray-700 mb-1">Početak radnog vremena</label>
                            <input type="time" name="start_time" id="start_time" value="{{ $startVal }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            @error('start_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="end_time" class="block text-sm font-medium text-gray-700 mb-1">Kraj radnog vremena</label>
                            <input type="time" name="end_time" id="end_time" value="{{ $endVal }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            @error('end_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex gap-3 pt-2">
                            <button type="submit" class="px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition">
                                Spremi promjene
                            </button>
                            <a href="{{ route('admin.stylists.delete') }}" class="px-4 py-2 border border-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-50 transition">
                                Odustani
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
