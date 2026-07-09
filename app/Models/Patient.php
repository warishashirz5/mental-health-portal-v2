<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Patient extends Authenticatable
{
    protected $table = 'patient';
    protected $primaryKey = 'patient_id';
    public $timestamps = false;

    protected $fillable = [
        'admin_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'date_of_birth',
    ];

    protected $hidden = ['password'];

    public function sessions()
    {
        return $this->hasMany(TherapySession::class, 'patient_id', 'patient_id');
    }

    public function moodLogs()
    {
        return $this->hasMany(MoodLog::class, 'patient_id', 'patient_id');
    }
}