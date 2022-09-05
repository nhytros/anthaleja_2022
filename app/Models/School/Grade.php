<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'school_grades';
    protected $fillable = ['level_id', 'name', 'description', 'status'];

    public function scopeGetActiveGrades($query)
    {
        return $query->where('status', 1)->get(['id', 'name']);
    }

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }
}
