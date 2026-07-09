<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = ['password'];

    public function therapists()
    {
        return $this->hasMany(Therapist::class, 'admin_id', 'admin_id');
    }

    public function patients()
    {
        return $this->hasMany(Patient::class, 'admin_id', 'admin_id');
    }
}