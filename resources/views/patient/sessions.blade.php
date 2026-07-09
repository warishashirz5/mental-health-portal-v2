@extends('layouts.app')
@section('title', 'My Sessions')
@section('content')

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">Book a Session</h2>
    <a href="{{ route('patient.dashboard') }}" class="text-sm text-blue-600 hover:underline">← Back to Dashboard</a>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-8">
    <form method="POST" action="{{ route('patient.sessions.book') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Select Therapist</label>
                <select name="therapist_id" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Choose Therapist</option>
                    @foreach($therapists as $t)
                    <option value="{{ $t->therapist_id }}">
                        Dr. {{ $t->first_name }} {{ $t->last_name }}
                        @if($t->specializations->count())
                            — {{ $t->specializations->pluck('specialization_name')->join(', ') }}
                        @endif
                    </option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Session Date</label>
                <input type="date" name="session_date" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Session Time</label>
                <input type="time" name="session_time" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>
        </div>
        <button type="submit" class="mt-4 bg-blue-800 text-white px-6 py-2 rounded hover:bg-blue-900 font-semibold">
            Book Session
        </button>
    </form>
</div>

<h3 class="text-xl font-bold text-blue-900 mb-4">My Sessions</h3>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-blue-900 text-white">
            <tr>
                <th class="p-3 text-left">Date</th>
                <th class="p-3 text-left">Time</th>
                <th class="p-3 text-left">Therapist</th>
                <th class="p-3 text-left">Status</th>
                <th class="p-3 text-left">Action</th>
            </tr>
        </thead>
        <tbody>
            @forelse($sessions as $s)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $s->session_date }}</td>
                <td class="p-3">{{ $s->session_time }}</td>
                <td class="p-3">Dr. {{ $s->therapist->first_name }} {{ $s->therapist->last_name }}</td>
                <td class="p-3">
                    <span class="px-2 py-1 rounded text-xs font-medium
                        {{ $s->status === 'scheduled' ? 'bg-green-100 text-green-700' : '' }}
                        {{ $s->status === 'cancelled' ? 'bg-red-100 text-red-700' : '' }}
                        {{ $s->status === 'completed' ? 'bg-blue-100 text-blue-700' : '' }}">
                        {{ ucfirst($s->status) }}
                    </span>
                </td>
                <td class="p-3">
                    @if($s->status === 'scheduled')
                    <form method="POST" action="{{ route('patient.sessions.cancel', $s->session_id) }}">
                        @csrf
                        <button class="text-red-600 hover:underline text-xs font-medium">Cancel</button>
                    </form>
                    @else
                    <span class="text-gray-400 text-xs">—</span>
                    @endif
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="p-4 text-center text-gray-500">No sessions found.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection