<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center gap-2">
            <a href="{{ route('admin.dashboard') }}" class="text-gray-500 hover:text-gray-700 text-sm">← Admin</a>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Delete stylist account') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12 flex items-center">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100 max-w-3xl">
                <div class="p-6 lg:p-8">
                    <p class="text-gray-600 mb-6">Delete a user account with the Stylist role. Their account will be permanently deleted.</p>
                    @if (session('status'))
                        <div class="rounded-lg bg-green-50 border border-green-200 text-green-800 px-4 py-3 mb-4">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-2xl border border-gray-100">
                        <div class="p-6 lg:p-8">
                            <h3 class="text-lg font-semibold text-gray-900 mb-4">All Stylists</h3>
                            @if($stylists->isEmpty())
                                <p class="text-gray-500">No stylists in the system yet.</p>
                            @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead>
                                        <tr>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Stylist</th>
                                            <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-gray-200">
                                        @foreach($stylists as $s)
                                            <tr>
                                                <td class="px-4 py-3 text-sm text-gray-900">{{ $s->id }}</td>
                                                <td class="px-4 py-3 text-sm text-gray-900">{{ $s->name }}</td>
                                                <td class="px-4 py-3 text-sm text-gray-600">{{ $s->email }}</td>
                                                <form action="{{ route('admin.stylists.destroy', $s->id) }}" method="POST" class="space-y-4">
                                                @csrf
                                                <td class="px-4 py-3">
                                                    <button type="submit" class="px-4 py-2 bg-pink-500 text-white font-semibold rounded-md hover:bg-pink-600 transition">Delete</button>
                                                </td>
                                                </form>
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
        </div>
    </div>
</x-app-layout>
