@extends('layouts.app')
@section('title', 'Mood Tracker')
@section('content')

<div class="mb-6 flex justify-between items-center">
    <h2 class="text-2xl font-bold text-blue-900">Mood Tracker</h2>
    <a href="{{ route('patient.dashboard') }}" class="text-sm text-blue-600 hover:underline">← Back to Dashboard</a>
</div>

<div class="bg-white rounded-lg shadow p-6 mb-8">
    <h3 class="text-lg font-semibold text-gray-700 mb-4">Log Today's Mood</h3>
    <form method="POST" action="{{ route('patient.mood.store') }}">
        @csrf
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Mood Level</label>
                <select name="mood_level" class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-teal-500" required>
                    <option value="">Select Mood</option>
                    <option value="happy">😊 Happy</option>
                    <option value="calm">😌 Calm</option>
                    <option value="anxious">😰 Anxious</option>
                    <option value="sad">😢 Sad</option>
                    <option value="angry">😠 Angry</option>
                    <option value="stressed">😓 Stressed</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                <input type="date" name="log_date" value="{{ date('Y-m-d') }}"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-teal-500" required>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Notes (optional)</label>
                <input type="text" name="notes" placeholder="How are you feeling?"
                    class="w-full border border-gray-300 p-2 rounded focus:ring-2 focus:ring-teal-500">
            </div>
        </div>
        <button type="submit" class="mt-4 bg-teal-700 text-white px-6 py-2 rounded hover:bg-teal-800 font-semibold">
            Save Mood
        </button>
    </form>
</div>

<h3 class="text-xl font-bold text-blue-900 mb-4">Mood History</h3>
<div class="bg-white rounded-lg shadow overflow-hidden">
    <table class="w-full text-sm">
        <thead class="bg-teal-700 text-white">
            <tr>
                <th class="p-3 text-left">Date</th>
                <th class="p-3 text-left">Mood</th>
                <th class="p-3 text-left">Notes</th>
            </tr>
        </thead>
        <tbody>
            @forelse($logs as $log)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-3">{{ $log->log_date }}</td>
                <td class="p-3 capitalize">{{ $log->mood_level }}</td>
                <td class="p-3 text-gray-600">{{ $log->notes ?? '—' }}</td>
            </tr>
            @empty
            <tr><td colspan="3" class="p-4 text-center text-gray-500">No mood logs yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection