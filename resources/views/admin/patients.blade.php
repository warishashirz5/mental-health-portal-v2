@extends('layouts.app')
@section('title', 'Manage Patients')
@section('content')

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">All Patients</h2>
    <a href="{{ route('admin.dashboard') }}" class="text-sm text-blue-600 hover:underline">← Back to Dashboard</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Phone</th>
                <th class="p-3 text-left">Date of Birth</th>
                <th class="p-3 text-left">Sessions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($patients as $p)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3 font-medium">{{ $p->first_name }} {{ $p->last_name }}</td>
                <td class="p-3">{{ $p->email }}</td>
                <td class="p-3">{{ $p->phone ?? '—' }}</td>
                <td class="p-3">{{ $p->date_of_birth ?? '—' }}</td>
                <td class="p-3">
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                        {{ $p->sessions->count() }}
                    </span>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="p-4 text-center text-gray-500">No patients found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection