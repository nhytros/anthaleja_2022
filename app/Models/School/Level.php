<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Level extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'school_levels';
    protected $fillable = ['name', 'description', 'status'];

    public function scopeGetActiveLevels($query)
    {
        return $query->where('status', 1)->get(['id', 'name']);
    }
}
