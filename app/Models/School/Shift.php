<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shift extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'school_shifts';
    protected $fillable = ['name', 'status'];

    public function scopeGetActiveShifts($query)
    {
        return $query->where('status', 1)->get(['id', 'name']);
    }
}
