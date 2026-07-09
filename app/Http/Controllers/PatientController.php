<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TherapySession;
use App\Models\MoodLog;

class PatientController extends Controller
{
    public function dashboard()
    {
        $patientId      = session('auth_user.id');
        $upcomingSessions = TherapySession::with('therapist')
                            ->where('patient_id', $patientId)
                            ->where('status', 'scheduled')
                            ->latest('session_date')
                            ->take(5)
                            ->get();

        $recentMoods    = MoodLog::where('patient_id', $patientId)
                            ->latest('log_date')
                            ->take(5)
                            ->get();

        return view('patient.dashboard', compact('upcomingSessions', 'recentMoods'));
    }
}