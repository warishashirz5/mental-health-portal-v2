@extends('layouts.app')
@section('title', 'Admin Dashboard')
@section('content')

<div class="mb-6">
    <h2 class="text-2xl font-bold text-blue-900">Admin Dashboard</h2>
    <p class="text-gray-600">Portal overview and management</p>
</div>

<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-blue-800 text-white p-6 rounded-lg shadow text-center">
        <p class="text-4xl font-bold">{{ $totalPatients }}</p>
        <p class="text-sm mt-1 opacity-80">Total Patients</p>
    </div>
    <div class="bg-teal-700 text-white p-6 rounded-lg shadow text-center">
        <p class="text-4xl font-bold">{{ $totalTherapists }}</p>
        <p class="text-sm mt-1 opacity-80">Total Therapists</p>
    </div>
    <div class="bg-purple-700 text-white p-6 rounded-lg shadow text-center">
        <p class="text-4xl font-bold">{{ $totalSessions }}</p>
        <p class="text-sm mt-1 opacity-80">Total Sessions</p>
    </div>
</div>

<div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-8">
    <a href="{{ route('admin.patients') }}" class="bg-white border border-blue-200 p-4 rounded-lg shadow hover:bg-blue-50 text-center">
        <p class="font-semibold text-blue-800">👥 Manage Patients</p>
    </a>
    <a href="{{ route('admin.therapists') }}" class="bg-white border border-teal-200 p-4 rounded-lg shadow hover:bg-teal-50 text-center">
        <p class="font-semibold text-teal-800">🩺 Manage Therapists</p>
    </a>
    <a href="{{ route('admin.sessions') }}" class="bg-white border border-purple-200 p-4 rounded-lg shadow hover:bg-purple-50 text-center">
        <p class="font-semibold text-purple-800">📅 All Sessions</p>
    </a>
    <a href="{{ route('admin.therapists.create') }}" class="bg-white border border-blue-200 p-4 rounded-lg shadow hover:bg-blue-50 text-center">
        <p class="font-semibold text-blue-800">➕ Add Therapist</p>
    </a>
    <a href="{{ route('admin.admins.create') }}" class="bg-white border border-gray-200 p-4 rounded-lg shadow hover:bg-gray-50 text-center">
        <p class="font-semibold text-gray-800">➕ Add Admin</p>
    </a>
</div>

<div class="bg-white rounded-lg shadow p-6">
    <h3 class="text-lg font-bold text-blue-900 mb-4">Recent Sessions</h3>
    <table class="w-full text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-2 text-left">Patient</th>
                <th class="p-2 text-left">Therapist</th>
                <th class="p-2 text-left">Date</th>
                <th class="p-2 text-left">Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse($recentSessions as $s)
            <tr class="border-b hover:bg-gray-50">
                <td class="p-2">{{ $s->patient->first_name }} {{ $s->patient->last_name }}</td>
                <td class="p-2">Dr. {{ $s->therapist->first_name }} {{ $s->therapist->last_name }}</td>
                <td class="p-2">{{ $s->session_date }}</td>
                <td class="p-2">
                    <span class="px-2 py-1 rounded text-xs bg-blue-100 text-blue-700">
                        {{ ucfirst($s->status) }}
                    </span>
                </td>
            </tr>
            @empty
            <tr><td colspan="4" class="p-4 text-center text-gray-500">No sessions yet.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection