<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{
    protected $table = 'availability';
    protected $primaryKey = 'availability_id';
    public $timestamps = false;

    protected $fillable = [
        'therapist_id',
        'availability_date',
        'start_time',
        'end_time',
    ];

    public function therapist()
    {
        return $this->belongsTo(Therapist::class, 'therapist_id', 'therapist_id');
    }
}