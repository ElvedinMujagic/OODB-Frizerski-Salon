<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-2">
            <a href="{{ route('admin.services.index') }}" class="text-gray-500 hover:text-gray-700 text-sm">← Services</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Uredi uslugu') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3 mb-6">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 max-w-xl">
                <div class="p-6 lg:p-8">
                    <form action="{{ route('admin.services.update', $service) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Naziv usluge</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $service->name) }}" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="price" class="block text-sm font-medium text-gray-700 mb-1">Cijena</label>
                            <input type="number" name="price" id="price" value="{{ old('price', $service->price) }}" required min="0" step="0.01" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            @error('price')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="avg_time" class="block text-sm font-medium text-gray-700 mb-1">Prosječno vrijeme (minute)</label>
                            <input type="number" name="avg_time" id="avg_time" value="{{ old('avg_time', $service->avg_time) }}" required min="1" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                            @error('avg_time')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="flex gap-3 pt-2">
                            <button type="submit" class="px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition">
                                Ažuriraj uslugu
                            </button>
                            <a href="{{ route('admin.services.index') }}" class="px-4 py-2 border border-gray-300 text-gray-700 font-medium rounded-md hover:bg-gray-50 transition">
                                Prekini
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
