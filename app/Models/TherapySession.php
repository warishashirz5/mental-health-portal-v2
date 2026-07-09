<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TherapySession extends Model
{
    protected $table = 'session';
    protected $primaryKey = 'session_id';
    public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'therapist_id',
        'followup_session_id',
        'session_date',
        'session_time',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }

    public function therapist()
    {
        return $this->belongsTo(Therapist::class, 'therapist_id', 'therapist_id');
    }

    public function notes()
    {
        return $this->hasMany(SessionNote::class, 'session_id', 'session_id');
    }

    public function report()
    {
        return $this->hasOne(ProgressReport::class, 'session_id', 'session_id');
    }

    public function followUp()
    {
        return $this->belongsTo(TherapySession::class, 'followup_session_id', 'session_id');
    }
}