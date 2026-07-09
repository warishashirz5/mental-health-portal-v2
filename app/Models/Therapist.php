<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Therapist extends Authenticatable
{
    protected $table = 'therapist';
    protected $primaryKey = 'therapist_id';
    public $timestamps = false;

    protected $fillable = [
        'admin_id',
        'first_name',
        'last_name',
        'email',
        'phone',
        'license_no',
        'password',
    ];

    protected $hidden = ['password'];

    public function specializations()
    {
        return $this->belongsToMany(
            Specialization::class,
            'therapist_specialization',
            'therapist_id',
            'specialization_id'
        );
    }

    public function availability()
    {
        return $this->hasMany(Availability::class, 'therapist_id', 'therapist_id');
    }

    public function sessions()
    {
        return $this->hasMany(TherapySession::class, 'therapist_id', 'therapist_id');
    }
}