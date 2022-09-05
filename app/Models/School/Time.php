<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Time extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'school_times';
    protected $fillable = ['shift_id', 'name', 'code', 'start', 'end', 'status'];

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id', 'id');
    }

    public function scopeGetActiveUserRoleAsTeacher($query)
    {
        return $query->where('status', 1)->get(['id', 'name']);
    }
}
