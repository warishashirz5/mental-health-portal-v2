@extends('layouts.app')
@section('title', 'Manage Therapists')
@section('content')

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">All Therapists</h2>
    <div class="flex gap-3">
        <a href="{{ route('admin.therapists.create') }}"
            class="bg-blue-800 text-white px-4 py-2 rounded hover:bg-blue-900 text-sm font-semibold">
            + Add Therapist
        </a>
        <a href="{{ route('admin.dashboard') }}" class="text-sm text-blue-600 hover:underline self-center">← Back</a>
    </div>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="p-3 text-left">Name</th>
                <th class="p-3 text-left">Email</th>
                <th class="p-3 text-left">Phone</th>
                <th class="p-3 text-left">License No</th>
                <th class="p-3 text-left">Specializations</th>
                <th class="p-3 text-left">Sessions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($therapists as $t)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3 font-medium">Dr. {{ $t->first_name }} {{ $t->last_name }}</td>
                <td class="p-3">{{ $t->email }}</td>
                <td class="p-3">{{ $t->phone ?? '—' }}</td>
                <td class="p-3">{{ $t->license_no }}</td>
                <td class="p-3">
                    @foreach($t->specializations as $spec)
                    <span class="bg-teal-100 text-teal-700 px-2 py-1 rounded text-xs mr-1">
                        {{ $spec->specialization_name }}
                    </span>
                    @endforeach
                </td>
                <td class="p-3">
                    <span class="bg-blue-100 text-blue-700 px-2 py-1 rounded text-xs">
                        {{ $t->sessions->count() }}
                    </span>
                </td>
            </tr>
            @empty
            <tr><td colspan="6" class="p-4 text-center text-gray-500">No therapists found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection