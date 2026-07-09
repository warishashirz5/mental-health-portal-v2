<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoodLog;

class MoodLogController extends Controller
{
    public function index()
    {
        $logs = MoodLog::where('patient_id', session('auth_user.id'))
                ->latest('log_date')
                ->get();

        return view('patient.mood', compact('logs'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'mood_level' => 'required|string|max:50',
            'notes'      => 'nullable|string',
            'log_date'   => 'required|date',
        ]);

        MoodLog::create([
            'patient_id' => session('auth_user.id'),
            'mood_level' => $request->mood_level,
            'notes'      => $request->notes,
            'log_date'   => $request->log_date,
        ]);

        return back()->with('success', 'Mood logged successfully!');
    }
}