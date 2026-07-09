<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MoodLog extends Model
{
    protected $table = 'mood_log';
    protected $primaryKey = 'log_id';
    public $timestamps = false;

    protected $fillable = [
        'patient_id',
        'mood_level',
        'notes',
        'log_date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'patient_id');
    }
}