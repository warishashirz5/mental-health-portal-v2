<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Patient;
use App\Models\Therapist;
use App\Models\TherapySession;
use App\Models\Specialization;
use App\Models\Admin;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalPatients   = Patient::count();
        $totalTherapists = Therapist::count();
        $totalSessions   = TherapySession::count();
        $recentSessions  = TherapySession::with('patient', 'therapist')
                            ->latest('session_date')
                            ->take(5)
                            ->get();

        return view('admin.dashboard', compact(
            'totalPatients',
            'totalTherapists',
            'totalSessions',
            'recentSessions'
        ));
    }

    public function patients()
    {
        $patients = Patient::with('sessions')->get();
        return view('admin.patients', compact('patients'));
    }

    public function therapists()
    {
        $therapists = Therapist::with('specializations', 'sessions')->get();
        return view('admin.therapists', compact('therapists'));
    }

    public function sessions()
    {
        $sessions = TherapySession::with('patient', 'therapist')
                    ->latest('session_date')
                    ->get();
        return view('admin.sessions', compact('sessions'));
    }

    // ── Add Therapist ──────────────────────────────────────────────────────
    public function createTherapist()
    {
        $specializations = Specialization::all();
        return view('admin.therapists_create', compact('specializations'));
    }

    public function storeTherapist(Request $request)
    {
        $request->validate([
            'first_name'       => 'required|string|max:50',
            'last_name'        => 'required|string|max:50',
            'email'            => 'required|email|unique:therapist,email',
            'phone'            => 'nullable|string|max:20',
            'license_no'       => 'required|string|unique:therapist,license_no',
            'password'         => 'required|confirmed|min:6',
            'specializations'  => 'nullable|array',
        ]);

        $therapist = Therapist::create([
            'admin_id'   => session('auth_user.id'),
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'license_no' => $request->license_no,
            'password'   => Hash::make($request->password),
        ]);

        if ($request->specializations) {
            $therapist->specializations()->attach($request->specializations);
        }

        return redirect()->route('admin.therapists')
                         ->with('success', 'Therapist added successfully!');
    }

    // ── Add Admin ──────────────────────────────────────────────────────────
    public function createAdmin()
    {
        return view('admin.admins_create');
    }

    public function storeAdmin(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|unique:admin,email',
            'password' => 'required|confirmed|min:6',
        ]);

        Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.dashboard')
                         ->with('success', 'Admin added successfully!');
    }

    // ── Delete ─────────────────────────────────────────────────────────────
    public function deleteTherapist($id)
    {
        Therapist::findOrFail($id)->delete();
        return back()->with('success', 'Therapist deleted.');
    }

    public function deletePatient($id)
    {
        Patient::findOrFail($id)->delete();
        return back()->with('success', 'Patient deleted.');
    }
}