@extends('layouts.admin')

@section('content')
    <h2 class="text-3xl font-extrabold text-pink-600 mb-6">👥 Customers</h2>

    <div class="bg-white rounded-2xl shadow border border-pink-100 overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-pink-100 text-pink-900">
                <tr>
                    <th class="p-4 text-left">Name</th>
                    <th class="p-4 text-left">Email</th>
                    <th class="p-4 text-left">Role</th>
                    <th class="p-4 text-left">Joined</th>
                </tr>
            </thead>
            <tbody>
                @forelse($customers as $c)
                    <tr class="border-t">
                        <td class="p-4 font-semibold">{{ $c->name }}</td>
                        <td class="p-4">{{ $c->email }}</td>
                        <td class="p-4">{{ $c->role }}</td>
                        <td class="p-4">{{ optional($c->created_at)->format('Y-m-d') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-gray-500">No customers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
