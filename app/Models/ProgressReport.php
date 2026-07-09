<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class ProgressReport extends Model
{
    protected $table = 'progress_report';
    protected $primaryKey = 'report_id';
    public $timestamps = false;

    protected $fillable = [
        'session_id',
        'therapist_id',
        'encrypted_report',
        'report_date',
    ];

    // Automatically encrypt when saving a report
    public function setReportAttribute($value)
    {
        $this->attributes['encrypted_report'] = Crypt::encryptString($value);
    }

    // Automatically decrypt when reading a report
    public function getReportAttribute()
    {
        return Crypt::decryptString($this->attributes['encrypted_report'] ?? '');
    }

    public function session()
    {
        return $this->belongsTo(TherapySession::class, 'session_id', 'session_id');
    }

    public function therapist()
    {
        return $this->belongsTo(Therapist::class, 'therapist_id', 'therapist_id');
    }
}