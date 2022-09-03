<?php

namespace App\Models\School;

use App\Models\Character;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'school_courses';
    protected $fillable = ['name', 'slug', 'teacher_id', 'batch_time', 'schedule'];
    protected $casts = ['schedule' => 'datetime:Y, d/m G:i:00'];

    public function teacher()
    {
        return $this->hasOne(Character::class);
    }
}
