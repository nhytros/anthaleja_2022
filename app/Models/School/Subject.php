<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'school_subjects';
    protected $fillable = [
        'name', 'code', 'credit', 'hour', 'assignment_percentage',
        'final_percentage', 'status'
    ];

    public function scopeGetActiveSubjects($query)
    {
        return $query->where('status', 1)->get(['id', 'name']);
    }
}
