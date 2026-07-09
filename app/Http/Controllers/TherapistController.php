<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TherapySession;
use App\Models\Availability;

class TherapistController extends Controller
{
    public function dashboard()
    {
        $therapistId = session('auth_user.id');
        $upcoming    = TherapySession::with('patient')
                        ->where('therapist_id', $therapistId)
                        ->where('status', 'scheduled')
                        ->latest('session_date')
                        ->take(5)
                        ->get();

        return view('therapist.dashboard', compact('upcoming'));
    }

    public function availability()
    {
        $therapistId   = session('auth_user.id');
        $availabilities = Availability::where('therapist_id', $therapistId)->get();
        return view('therapist.availability', compact('availabilities'));
    }

    public function storeAvailability(Request $request)
    {
        $request->validate([
            'availability_date' => 'required|date',
            'start_time'        => 'required',
            'end_time'          => 'required',
        ]);

        Availability::create([
            'therapist_id'      => session('auth_user.id'),
            'availability_date' => $request->availability_date,
            'start_time'        => $request->start_time,
            'end_time'          => $request->end_time,
        ]);

        return back()->with('success', 'Availability saved.');
    }
}