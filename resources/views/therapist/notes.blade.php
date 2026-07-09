@extends('layouts.app')
@section('title', 'Session Notes')
@section('content')

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">Session Notes</h2>
    <a href="{{ route('therapist.sessions') }}" class="text-sm text-blue-600 hover:underline">← Back to Sessions</a>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-6">
    <p class="text-gray-600 text-sm mb-1">Patient:
        <span class="font-semibold text-gray-800">
            {{ $session->patient->first_name }} {{ $session->patient->last_name }}
        </span>
    </p>
    <p class="text-gray-600 text-sm">Date:
        <span class="font-semibold text-gray-800">{{ $session->session_date }} at {{ $session->session_time }}</span>
    </p>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Add Encrypted Note</h3>
    <form method="POST" action="{{ route('therapist.sessions.note', $session->session_id) }}">
        @csrf
        <textarea name="note" rows="4" placeholder="Write your confidential session note here..."
            class="w-full border border-gray-300 p-3 rounded focus:ring-2 focus:ring-blue-500 mb-3" required></textarea>
        <button type="submit" class="bg-blue-800 text-white px-6 py-2 rounded hover:bg-blue-900 font-semibold">
            Save Note (Encrypted)
        </button>
    </form>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-6">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Add Progress Report</h3>
    <form method="POST" action="{{ route('therapist.sessions.report', $session->session_id) }}">
        @csrf
        <textarea name="report" rows="4" placeholder="Write progress report..."
            class="w-full border border-gray-300 p-3 rounded focus:ring-2 focus:ring-blue-500 mb-3" required></textarea>
        <div class="mb-3">
            <label class="block text-sm font-medium text-gray-700 mb-1">Report Date</label>
            <input type="date" name="report_date" value="{{ date('Y-m-d') }}"
                class="border border-gray-300 p-2 rounded focus:ring-2 focus:ring-blue-500">
        </div>
        <button type="submit" class="bg-teal-700 text-white px-6 py-2 rounded hover:bg-teal-800 font-semibold">
            Save Report (Encrypted)
        </button>
    </form>
</div>

<h3 class="text-xl font-bold text-blue-900 mb-4">Previous Notes</h3>
<div class="space-y-3">
    @forelse($notes as $note)
    <div class="bg-white rounded-lg shadow p-4">
        <p class="text-gray-800">{{ $note->note }}</p>
        <p class="text-xs text-gray-400 mt-2">{{ $note->created_at }}</p>
    </div>
    @empty
    <p class="text-gray-500 text-sm">No notes yet for this session.</p>
    @endforelse
</div>

@endsection