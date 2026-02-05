<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Moji termini') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3 mb-6">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-6 lg:p-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Termini dodijeljeni vama</h3>
                    @if($appointments->isEmpty())
                        <p class="text-gray-500">Nemate zakazanih termina.</p>
                    @else
                        <ul class="divide-y divide-gray-200">
                            @foreach($appointments as $apt)
                                <li class="py-4 first:pt-0 last:pb-0">
                                    <div class="flex flex-wrap items-start justify-between gap-4">
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $apt->client->name }} {{ $apt->client->lastname }}</p>
                                            <p class="text-sm text-gray-500">{{ $apt->appointment_at->format('l, M j, Y \a\t g:i A') }}</p>
                                            @if($apt->service)
                                                <p class="text-sm text-gray-600 mt-1">{{ $apt->service->name }} — {{ number_format($apt->service->price, 2) }}</p>
                                            @endif
                                            @if($apt->notes)
                                                <p class="text-sm text-gray-600 mt-1">{{ $apt->notes }}</p>
                                            @endif
                                            <span class="inline-flex items-center mt-2 px-2.5 py-0.5 rounded-full text-xs font-medium
                                                @if($apt->status === 'accepted') bg-green-100 text-green-800
                                                @elseif($apt->status === 'rejected') bg-red-100 text-red-800
                                                @else bg-amber-100 text-amber-800
                                                @endif">
                                                {{ ucfirst($apt->status) }}
                                            </span>
                                        </div>
                                        @if($apt->isPending())
                                            <div class="flex gap-2">
                                                <form action="{{ route('appointments.update', $apt) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="accepted">
                                                    <button type="submit" class="px-3 py-1.5 bg-green-500 text-white text-sm font-medium rounded-md hover:bg-green-600 transition">
                                                        Prihvati
                                                    </button>
                                                </form>
                                                <form action="{{ route('appointments.update', $apt) }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('PUT')
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="px-3 py-1.5 bg-red-500 text-white text-sm font-medium rounded-md hover:bg-red-600 transition">
                                                        Odbij
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
