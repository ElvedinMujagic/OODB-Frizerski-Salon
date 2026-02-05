<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moji termini') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            @if (session('status'))
                <div class="rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3">
                    {{ session('status') }}
                </div>
            @endif

            {{-- New appointment form --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-6 lg:p-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Zatraži novi termin</h3>
                    @if($stylists->isEmpty())
                        <p class="text-gray-500">Nema dostupnih frizera. Molimo vas da se vratite kasnije.</p>
                    @else
                        <form action="{{ route('appointments.store') }}" method="POST" class="space-y-4 max-w-xl">
                            @csrf
                            <div>
                                <label for="stylist_id" class="block text-sm font-medium text-gray-700 mb-1">Stylist</label>
                                <select name="stylist_id" id="stylist_id" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                    <option value="">Odaberite frizera</option>
                                    @foreach($stylists as $s)
                                        <option value="{{ $s->id }}" {{ old('stylist_id') == $s->id ? 'selected' : '' }}>{{ $s->name }} {{ $s->lastname }}</option>
                                    @endforeach
                                </select>
                                @error('stylist_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="service_id" class="block text-sm font-medium text-gray-700 mb-1">Service</label>
                                <select name="service_id" id="service_id" required class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                    <option value="">Odaberite uslugu</option>
                                    @foreach($services as $sr)
                                        <option value="{{ $sr->id }}" {{ old('service_id') == $sr->id ? 'selected' : '' }}>
                                            {{ $sr->name }} -
                                            {{ $sr->price }} KM -
                                            {{ $sr->avg_time }} Min 
                                        </option>
                                    @endforeach
                                </select>
                                @error('service_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror                                
                            </div>
                            <div>
                                <label for="appointment_at" class="block text-sm font-medium text-gray-700 mb-1">Datum i vrijeme</label>
                                <input required type="datetime-local" name="appointment_at" id="appointment_at" value="{{ old('appointment_at') }}" 
                                    min="{{ now()->addDay()->setTime(8, 0)->format('Y-m-d\TH:i') }}"
                                    max="{{ now()->addDay(30)->setTime(16, 0)->format('Y-m-d\TH:i') }}"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500">
                                @error('appointment_at')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Napomena</label>
                                <textarea name="notes" id="notes" rows="2" class="w-full rounded-md border-gray-300 shadow-sm focus:border-pink-500 focus:ring-pink-500" placeholder="Any special requests?">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <button type="submit" class="px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition">
                                Zakazi termin
                            </button>
                        </form>
                    @endif
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-6 lg:p-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Moji termini</h3>
                    @if($appointments->isEmpty())
                        <p class="text-gray-500">Nemate zakazanih termina.</p>
                    @else
                        <ul class="divide-y divide-gray-200">
                            @foreach($appointments as $apt)
                                <li class="py-4 first:pt-0 last:pb-0 flex flex-wrap items-center justify-between gap-2">
                                    <div>
                                        <p class="font-medium text-gray-900">Sa {{ $apt->stylist->name }} {{ $apt->stylist->lastname }}</p>
                                        <p class="text-sm text-gray-500">{{ $apt->appointment_at->format('M j, Y \@ H:i') }}</p>
                                        @if($apt->service)
                                            <p class="text-sm text-gray-600 mt-1">{{ $apt->service->name }} — {{ number_format($apt->service->price, 2) }} KM</p>
                                        @endif
                                        @if($apt->notes)
                                            <p class="text-sm text-gray-600 mt-1">{{ $apt->notes }}</p>
                                        @endif
                                    </div>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($apt->status === 'accepted') bg-green-100 text-green-800
                                        @elseif($apt->status === 'rejected') bg-red-100 text-red-800
                                        @else bg-amber-100 text-amber-800
                                        @endif">
                                        {{ ucfirst($apt->status) }}
                                    </span>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
