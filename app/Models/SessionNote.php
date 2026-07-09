<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class SessionNote extends Model
{
    protected $table = 'session_note';
    protected $primaryKey = 'note_id';

    public $timestamps = false;

    protected $fillable = [
        'session_id',
        'therapist_id',
        'encrypted_note',
    ];

    // Automatically encrypt when saving a note
    public function setNoteAttribute($value)
    {
        $this->attributes['encrypted_note'] = Crypt::encryptString($value);
    }

    // Automatically decrypt when reading a note
    public function getNoteAttribute()
    {
        return Crypt::decryptString($this->attributes['encrypted_note'] ?? '');
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