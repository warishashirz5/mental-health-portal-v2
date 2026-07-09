<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    protected $table = 'specialization';
    protected $primaryKey = 'specialization_id';
    public $timestamps = false;
    protected $fillable = [
        'specialization_name',
        'description',
    ];

    public function therapists()
    {
        return $this->belongsToMany(
            Therapist::class,
            'therapist_specialization',
            'specialization_id',
            'therapist_id'
        );
    }
}