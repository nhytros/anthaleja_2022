<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Klass extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'school_classes';
    protected $fillable = ['name', 'code', 'grade_id', 'description', 'status'];

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function scopeGetActiveClasses($query)
    {
        return $query->where('status', 1)->get(['id', 'name']);
    }
}
