<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-1">
            <div class="flex flex-wrap items-center gap-3">
                <a href="{{ route('home') }}" class="text-gray-500 hover:text-gray-700 text-sm font-medium flex items-center gap-1">
                    ← {{ __('Home') }}
                </a>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Admin – Svi Termini') }}
                </h2>
            </div>
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('admin.services.index') }}" class="px-3 py-2 bg-gray-700 text-white font-semibold rounded-md hover:bg-gray-800 transition text-sm">
                    Upravljanje uslugama
                </a>
                <a href="{{ route('admin.stylists.create') }}" class="px-3 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition text-sm">
                    Napravi profil frizera
                </a>
                <a href="{{ route('admin.stylists.delete') }}" class="px-3 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition text-sm">
                    Obriši profil frizera
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session('status'))
                <div class="rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3 mb-6">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 mb-6">
                <div class="p-6 lg:p-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Prikaži termine</h3>
                    <form action="{{ route('admin.dashboard') }}" method="GET" class="flex flex-wrap items-end gap-4">
                        <div>
                            <label for="filter" class="block text-sm font-medium text-gray-700 mb-1">Filter</label>
                            <select name="filter" id="filter" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="all" {{ ($filter ?? 'all') === 'all' ? 'selected' : '' }}>Svi termini</option>
                                <option value="day" {{ ($filter ?? '') === 'day' ? 'selected' : '' }}>Po danu</option>
                                <option value="month" {{ ($filter ?? '') === 'month' ? 'selected' : '' }}>Po mjesecu</option>
                                <option value="year" {{ ($filter ?? '') === 'year' ? 'selected' : '' }}>Po godini</option>
                            </select>
                        </div>
                        <div id="filter-day" class="filter-option" style="{{ ($filter ?? '') === 'day' ? '' : 'display: none;' }}">
                            <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Datum</label>
                            <input type="date" name="date" id="date" value="{{ $date ?? '' }}" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                        </div>
                        <div id="filter-month" class="filter-option flex gap-2" style="{{ ($filter ?? '') === 'month' ? '' : 'display: none;' }}">
                            <div>
                                <label for="month" class="block text-sm font-medium text-gray-700 mb-1">Mjesec</label>
                                <select name="month" id="month" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                    @foreach(range(1, 12) as $m)
                                        <option value="{{ $m }}" {{ (int)($month ?? 0) === $m ? 'selected' : '' }}>{{ \Carbon\Carbon::createFromDate(null, $m, 1)->translatedFormat('F') }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <label for="year_month" class="block text-sm font-medium text-gray-700 mb-1">Godina</label>
                                <input type="number" name="year_month" id="year_month" value="{{ $year ?? now()->year }}" min="2020" max="2030" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 w-24">
                            </div>
                        </div>
                        <div id="filter-year" class="filter-option" style="{{ ($filter ?? '') === 'year' ? '' : 'display: none;' }}">
                            <label for="year_only" class="block text-sm font-medium text-gray-700 mb-1">Godina</label>
                            <input type="number" name="year_only" id="year_only" value="{{ $year ?? now()->year }}" min="2020" max="2030" class="rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 w-24">
                        </div>
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition">Prikaži</button>
                    </form>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-6 lg:p-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Svi termini (prihvaćeni i odbijeni)</h3>
                    @if($appointments->isEmpty())
                        <p class="text-gray-500">Nema termina u sistemu.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Klijent</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Frizer</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Usluga</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Datum i vrijeme</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($appointments as $apt)
                                        <tr>
                                            <td class="px-4 py-3 text-sm text-gray-900">{{ $apt->client->name }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-900">{{ $apt->stylist->name }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-600">
                                                @if($apt->service)
                                                    {{ $apt->service->name }} — {{ number_format($apt->service->price, 2) }} KM
                                                @else
                                                    —
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-600">{{ $apt->appointment_at->format('M j, Y g:i A') }}</td>
                                            <td class="px-4 py-3">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                                    @if($apt->status === 'accepted') bg-green-100 text-green-800
                                                    @elseif($apt->status === 'rejected') bg-red-100 text-red-800
                                                    @elseif($apt->status === 'cancelled') bg-gray-100 text-gray-700
                                                    @else bg-amber-100 text-amber-800
                                                    @endif">
                                                    {{ $apt->status_label }}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('filter').addEventListener('change', function() {
            var v = this.value;
            document.getElementById('filter-day').style.display = v === 'day' ? '' : 'none';
            document.getElementById('filter-month').style.display = v === 'month' ? '' : 'none';
            document.getElementById('filter-year').style.display = v === 'year' ? '' : 'none';
        });
    </script>
</x-app-layout>
