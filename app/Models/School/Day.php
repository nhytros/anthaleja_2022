<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Day extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'school_days';
    protected $fillable = ['name', 'status'];

    public function scopeGetActiveDays($query)
    {
        return $query->where('status', 1)->get(['id', 'name']);
    }
}
