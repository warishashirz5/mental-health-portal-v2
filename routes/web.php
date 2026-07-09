<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TherapistController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\MoodLogController;

// ── Public Routes ──────────────────────────────────────────────────────────
Route::get('/', fn() => redirect()->route('login'));

Route::get('/login',    [AuthController::class, 'showLogin'])->name('login');
Route::post('/login',   [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register',[AuthController::class, 'register']);
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

// ── Patient Routes ─────────────────────────────────────────────────────────
Route::prefix('patient')->middleware('role:patient')->name('patient.')->group(function () {
    Route::get('/',                              [PatientController::class, 'dashboard'])->name('dashboard');
    Route::get('/sessions',                      [SessionController::class, 'index'])->name('sessions');
    Route::post('/sessions',                     [SessionController::class, 'book'])->name('sessions.book');
    Route::post('/sessions/{session}/cancel',    [SessionController::class, 'cancel'])->name('sessions.cancel');
    Route::get('/mood',                          [MoodLogController::class, 'index'])->name('mood');
    Route::post('/mood',                         [MoodLogController::class, 'store'])->name('mood.store');
});

// ── Therapist Routes ───────────────────────────────────────────────────────
Route::prefix('therapist')->middleware('role:therapist')->name('therapist.')->group(function () {
    Route::get('/',                                  [TherapistController::class, 'dashboard'])->name('dashboard');
    Route::get('/sessions',                          [SessionController::class, 'therapistSessions'])->name('sessions');
    Route::get('/sessions/{session}/notes',          [SessionController::class, 'viewNotes'])->name('sessions.notes');
    Route::post('/sessions/{session}/note',          [SessionController::class, 'addNote'])->name('sessions.note');
    Route::post('/sessions/{session}/report',        [SessionController::class, 'addReport'])->name('sessions.report');
    Route::get('/availability',                      [TherapistController::class, 'availability'])->name('availability');
    Route::post('/availability',                     [TherapistController::class, 'storeAvailability'])->name('availability.store');
});

// ── Admin Routes ───────────────────────────────────────────────────────────
Route::prefix('admin')->middleware('role:admin')->name('admin.')->group(function () {
    Route::get('/',                        [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/patients',                [AdminController::class, 'patients'])->name('patients');
    Route::get('/therapists',              [AdminController::class, 'therapists'])->name('therapists');
    Route::get('/sessions',                [AdminController::class, 'sessions'])->name('sessions');

    // Add Therapist
    Route::get('/therapists/create',       [AdminController::class, 'createTherapist'])->name('therapists.create');
    Route::post('/therapists',             [AdminController::class, 'storeTherapist'])->name('therapists.store');

    // Add Admin
    Route::get('/admins/create',           [AdminController::class, 'createAdmin'])->name('admins.create');
    Route::post('/admins',                 [AdminController::class, 'storeAdmin'])->name('admins.store');

    // Delete
    Route::delete('/therapists/{id}',      [AdminController::class, 'deleteTherapist'])->name('therapists.delete');
    Route::delete('/patients/{id}',        [AdminController::class, 'deletePatient'])->name('patients.delete');
});
