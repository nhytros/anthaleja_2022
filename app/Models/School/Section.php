<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'school_sections';
    protected $fillable = ['name', 'code', 'status'];

    public function scopeGetActiveSections($query)
    {
        return $query->where('status', 1)->get(['id', 'name']);
    }
}
