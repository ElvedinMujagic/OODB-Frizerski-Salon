<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-1">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Admin – All Appointments') }}
            </h2>
            <div class="flex flex-wrap items-center gap-2">
                <a href="{{ route('admin.services.index') }}" class="px-3 py-2 bg-gray-700 text-white font-semibold rounded-md hover:bg-gray-800 transition text-sm">
                    Manage services
                </a>
                <a href="{{ route('admin.stylists.create') }}" class="px-3 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition text-sm">
                    Create stylist account
                </a>
                <a href="{{ route('admin.stylists.delete') }}" class="px-3 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition text-sm">
                    Delete stylist account
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

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                <div class="p-6 lg:p-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">All appointments (accepted and rejected)</h3>
                    @if($appointments->isEmpty())
                        <p class="text-gray-500">No appointments in the system yet.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Client</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Stylist</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Service</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Date & time</th>
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
                                                    @else bg-amber-100 text-amber-800
                                                    @endif">
                                                    {{ ucfirst($apt->status) }}
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
</x-app-layout>
