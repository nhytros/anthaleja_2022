<?php

namespace App\Models\School;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LevelGradeClassSubject extends Model
{
    use HasFactory;

    public $table = 'school_level_grade_class_subjects';
    protected $fillable = ['level_id', 'grade_id', 'class_id', 'subject_id'];

    public function level()
    {
        return $this->belongsTo(Level::class, 'level_id', 'id');
    }

    public function grade()
    {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function klass()
    {
        return $this->belongsTo(Klass::class, 'class_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }
}
