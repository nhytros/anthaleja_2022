<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Roll extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'school_rolls';
    protected $fillable = ['name', 'code', 'student_id', 'status'];
}
