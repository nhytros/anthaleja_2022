<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'school_sessions';
    protected $fillable = ['name', 'code', 'current_session', 'status'];

    // Get all active sessions
    public function scopeGetActiveSessions($query)
    {
        return $query->where('status', 1)->get(['id', 'name', 'code']);
    }

    // Get current active session
    public function scopeGetCurrentSession($query)
    {
        return $query->where('current_session', 1)->get(['id', 'name', 'code']);
    }
}
