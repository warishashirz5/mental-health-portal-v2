@extends('layouts.app')
@section('title', 'Therapist Dashboard')
@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold text-blue-900">Therapist Dashboard</h2>
    <p class="text-gray-600">Welcome, Dr. {{ session('auth_user.name') }}!</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <a href="{{ route('therapist.sessions') }}" class="bg-blue-800 text-white p-6 rounded-lg shadow hover:bg-blue-900">
        <h3 class="text-lg font-bold mb-1">📋 My Sessions</h3>
        <p class="text-sm opacity-80">View patient sessions and add notes</p>
    </a>
    <a href="{{ route('therapist.availability') }}" class="bg-teal-700 text-white p-6 rounded-lg shadow hover:bg-teal-800">
        <h3 class="text-lg font-bold mb-1">🗓️ My Availability</h3>
        <p class="text-sm opacity-80">Set your available dates and times</p>
    </a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-bold text-blue-900 mb-4">Upcoming Sessions</h3>
    @forelse($upcoming as $s)
    <div class="border-b py-3 flex justify-between items-center">
        <div>
            <p class="font-medium">{{ $s->patient->first_name }} {{ $s->patient->last_name }}</p>
            <p class="text-sm text-gray-500">{{ $s->session_date }} at {{ $s->session_time }}</p>
        </div>
        <a href="{{ route('therapist.sessions.notes', $s->session_id) }}"
            class="text-blue-600 text-sm hover:underline">View Notes →</a>
    </div>
    @empty
    <p class="text-gray-500 text-sm">No upcoming sessions.</p>
    @endforelse
</div>

@endsection