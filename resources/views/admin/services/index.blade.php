<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-gray-700 text-sm">← Admin</a>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Upravljanje uslugama') }}
                </h2>
            </div>
            <a href="{{ route('admin.services.create') }}" class="px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition text-sm">
                Napravi novu uslugu
            </a>
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
                    @if($services->isEmpty())
                        <p class="text-gray-500 mb-4">Nema usluga. Napravite jednu da biste započeli.</p>
                        <a href="{{ route('admin.services.create') }}" class="inline-block px-4 py-2 bg-blue-500 text-white font-semibold rounded-md hover:bg-blue-600 transition">Napravi novu uslugu</a>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Name</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Avg. time</th>
                                        <th class="px-4 py-2 text-right text-xs font-medium text-gray-500 uppercase">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200">
                                    @foreach($services as $service)
                                        <tr>
                                            <td class="px-4 py-3 text-sm font-medium text-gray-900">{{ $service->name }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-600">{{ number_format($service->price, 2) }}</td>
                                            <td class="px-4 py-3 text-sm text-gray-600">{{ $service->formatted_avg_time }}</td>
                                            <td class="px-4 py-3 text-right">
                                                <a href="{{ route('admin.services.edit', $service) }}" class="text-blue-600 hover:text-blue-700 font-medium text-sm">Uredi</a>
                                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline ml-3" onsubmit="return confirm('Obriši ovu uslugu?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-red-600 hover:text-red-700 font-medium text-sm">Obriši</button>
                                                </form>
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
