@extends('layouts.app')
@section('title', 'All Sessions')
@section('content')

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">All Sessions</h2>
    <a href="{{ route('admin.dashboard') }}" class="text-sm text-blue-600 hover:underline">← Back to Dashboard</a>
</div>

<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="p-3 text-left">Patient</th>
                <th class="p-3 text-left">Therapist</th>
                <th class="p-3 text-left">Date</th>
                <th class="p-3 text-left">Time</th>
                <th class="p-3 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sessions as $s)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $s->patient->first_name }} {{ $s->patient->last_name }}</td>
                <td class="p-3">Dr. {{ $s->therapist->first_name }} {{ $s->therapist->last_name }}</td>
                <td class="p-3">{{ $s->session_date }}</td>
                <td class="p-3">{{ $s->session_time }}</td>
                <td class="p-3">
                    <span class="px-2 py-1 rounded text-xs font-medium
                        {{ $s->status === 'scheduled' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $s->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}
                        {{ $s->status === 'completed' ? 'bg-blue-100 text-blue-700' : '' }}">
                        {{ ucfirst($s->status) }}
                    </span>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="p-4 text-center text-gray-500">No sessions found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection