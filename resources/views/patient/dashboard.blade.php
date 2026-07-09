@extends('layouts.app')
@section('title', 'Patient Dashboard')
@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold text-blue-900">Patient Dashboard</h2>
    <p class="text-gray-600">Welcome back, {{ session('auth_user.name') }}!</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
    <a href="{{ route('patient.sessions') }}" class="bg-blue-800 text-white p-6 rounded-lg shadow hover:bg-blue-900">
        <h3 class="text-lg font-bold mb-1">📅 My Sessions</h3>
        <p class="text-sm opacity-80">Book or view your therapy sessions</p>
    </a>
    <a href="{{ route('patient.mood') }}" class="bg-teal-700 text-white p-6 rounded-lg shadow hover:bg-teal-800">
        <h3 class="text-lg font-bold mb-1">😊 Mood Tracker</h3>
        <p class="text-sm opacity-80">Log and track your daily mood</p>
    </a>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-blue-900 mb-4">Upcoming Sessions</h3>
        @forelse($upcomingSessions as $s)
        <div class="border-b py-3">
            <p class="font-medium">Dr. {{ $s->therapist->first_name }} {{ $s->therapist->last_name }}</p>
            <p class="text-sm text-gray-500">{{ $s->session_date }} at {{ $s->session_time }}</p>
            <span class="text-xs bg-green-100 text-green-700 px-2 py-1 rounded">{{ $s->status }}</span>
        </div>
        @empty
        <p class="text-gray-500 text-sm">No upcoming sessions.</p>
        @endforelse
    </div>

    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-blue-900 mb-4">Recent Mood Logs</h3>
        @forelse($recentMoods as $mood)
        <div class="border-b py-3">
            <p class="font-medium capitalize">{{ $mood->mood_level }}</p>
            <p class="text-sm text-gray-500">{{ $mood->log_date }} — {{ $mood->notes }}</p>
        </div>
        @empty
        <p class="text-gray-500 text-sm">No mood logs yet.</p>
        @endforelse
    </div>
</div>

@endsection