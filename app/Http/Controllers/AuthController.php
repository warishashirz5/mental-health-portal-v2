<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Patient;
use App\Models\Therapist;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
            'role'     => 'required|in:admin,patient,therapist',
        ]);

        $role  = $request->role;
        $email = $request->email;
        $pass  = $request->password;

        $model = match($role) {
            'admin'     => Admin::class,
            'patient'   => Patient::class,
            'therapist' => Therapist::class,
        };

        $user = $model::where('email', $email)->first();

        if (!$user || !Hash::check($pass, $user->password)) {
            return back()->withErrors(['email' => 'Invalid credentials.']);
        }

        session([
            'auth_user' => [
                'role' => $role,
                'id'   => $user->getKey(),
                'name' => $user->first_name ?? $user->name,
            ]
        ]);

        return redirect()->route($role . '.dashboard');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'role' => 'required|in:patient,therapist,admin',
        ]);

        return match ($request->role) {
            'patient'   => $this->registerPatient($request),
            'therapist' => $this->registerTherapist($request),
            'admin'     => $this->registerAdmin($request),
        };
    }

    protected function registerPatient(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|string|max:50',
            'last_name'     => 'required|string|max:50',
            'email'         => 'required|email|unique:patient,email',
            'phone'         => 'nullable|string|max:20',
            'password'      => 'required|confirmed|min:6',
            'date_of_birth' => 'nullable|date',
        ]);

        Patient::create([
            'first_name'    => $request->first_name,
            'last_name'     => $request->last_name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'date_of_birth' => $request->date_of_birth,
            'password'      => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registered successfully! Please login as a Patient.');
    }

    protected function registerTherapist(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name'  => 'required|string|max:50',
            'email'      => 'required|email|unique:therapist,email',
            'phone'      => 'nullable|string|max:20',
            'license_no' => 'required|string|unique:therapist,license_no',
            'password'   => 'required|confirmed|min:6',
        ]);

        Therapist::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'license_no' => $request->license_no,
            'password'   => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registered successfully! Please login as a Therapist.');
    }

    protected function registerAdmin(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:100',
            'email'         => 'required|email|unique:admin,email',
            'password'      => 'required|confirmed|min:6',
            'access_code'   => 'required|string',
        ]);

        if ($request->access_code !== config('services.admin_register_code')) {
            return back()->withErrors(['access_code' => 'Invalid admin access code.'])->withInput();
        }

        Admin::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registered successfully! Please login as an Admin.');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('auth_user');
        return redirect()->route('login')->with('success', 'Logged out successfully.');
    }
}