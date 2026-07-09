<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TherapySession;
use App\Models\Therapist;
use App\Models\SessionNote;
use App\Models\ProgressReport;

class SessionController extends Controller
{
    // Patient: view therapists and their own sessions
    public function index()
    {
        $therapists = Therapist::with('specializations', 'availability')->get();
        $patientId  = session('auth_user.id');
        $sessions   = TherapySession::with('therapist')
                        ->where('patient_id', $patientId)
                        ->latest('session_date')
                        ->get();

        return view('patient.sessions', compact('therapists', 'sessions'));
    }

    // Patient: book a session
    public function book(Request $request)
    {
        $request->validate([
            'therapist_id' => 'required',
            'session_date' => 'required|date',
            'session_time' => 'required',
        ]);

        TherapySession::create([
            'patient_id'   => session('auth_user.id'),
            'therapist_id' => $request->therapist_id,
            'session_date' => $request->session_date,
            'session_time' => $request->session_time,
            'status'       => 'scheduled',
        ]);

        return back()->with('success', 'Session booked successfully!');
    }

    // Patient: cancel a session
    public function cancel(TherapySession $session)
    {
        $session->update(['status' => 'cancelled']);
        return back()->with('success', 'Session cancelled.');
    }

    // Therapist: view their sessions
    public function therapistSessions()
    {
        $sessions = TherapySession::with('patient')
                    ->where('therapist_id', session('auth_user.id'))
                    ->latest('session_date')
                    ->get();

        return view('therapist.sessions', compact('sessions'));
    }

    // Therapist: view notes for a session
    public function viewNotes(TherapySession $session)
    {
        $notes = SessionNote::where('session_id', $session->session_id)->get();
        return view('therapist.notes', compact('session', 'notes'));
    }

    // Therapist: add encrypted note
    public function addNote(Request $request, TherapySession $session)
    {
        $request->validate(['note' => 'required|string']);

        $note = new SessionNote();
        $note->session_id   = $session->session_id;
        $note->therapist_id = session('auth_user.id');
        $note->note         = $request->note;
        $note->save();

        return back()->with('success', 'Note saved and encrypted successfully.');
    }

    // Therapist: add progress report
    public function addReport(Request $request, TherapySession $session)
    {
        $request->validate(['report' => 'required|string', 'report_date' => 'required|date']);

        $report = new ProgressReport();
        $report->session_id   = $session->session_id;
        $report->therapist_id = session('auth_user.id');
        $report->report       = $request->report;
        $report->report_date  = $request->report_date;
        $report->save();

        return back()->with('success', 'Progress report saved.');
    }

    // Admin: view all sessions
    public function allSessions()
    {
        $sessions = TherapySession::with('patient', 'therapist')->latest('session_date')->get();
        return view('admin.sessions', compact('sessions'));
    }
}