<?php

namespace App\Models\School;

use App\Models\Character;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRouting extends Model
{
    use HasFactory;

    public $table = 'school_class_routings';
    protected $fillable = [
        'level_id', 'grade_id', 'class_id', 'session_id',
        'subject_id', 'day_id', 'shift_id', 'time_id',
        'section_id', 'teacher_id', 'status',
    ];
    protected $with = [
        'level:id,name',
        'class:id,name',
        'subject:id,name,code,hours,credits,assignment_percentage,final_percentage',
        'time:id,name,start,end',
        'shift:id,name',
        'section:id,name',
        'day:id,name',
        'session:id,name,code',
        'teacher:id,name',
    ];

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
        return $this->belongsTo(Klass::class, 'klass_id', 'id');
    }

    public function session()
    {
        return $this->belongsTo(Session::class, 'session_id', 'id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id', 'id');
    }

    public function day()
    {
        return $this->belongsTo(Day::class, 'day_id', 'id');
    }

    public function shift()
    {
        return $this->belongsTo(Shift::class, 'shift_id', 'id');
    }

    public function time()
    {
        return $this->belongsTo(Time::class, 'time_id', 'id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class, 'section_id', 'id');
    }

    public function teacher()
    {
        return $this->belongsTo(Character::class, 'teacher_id', 'id');
    }

    public function scopeTeacherGetClasses($query)
    {
        return $query->select('class_id', 'grade_id', 'subject_id')
            ->where('teacher_id', auth()->user()->id)
            ->groupBy('class_id')
            ->orderBy('class_id', 'asc');
    }

    public function scopeGetScheduleByClassAndGrade($query, $grade = null, $class = null, $teacher = null)
    {
        if ($grade != null && $class != null && $teacher == null) {
            return $query->where(['grade_id' => $grade, 'class_id' => $class])
                ->orderBy('class_id', 'asc')->get();
        } elseif ($teacher != null) {
            return $query->where(['teacher_id' => $teacher])
                ->orderBy('class_id', 'asc')->get();
        } else {
            $query->get();
        }
    }

    public function scopeGetScheduleByGrade($query, $grade_id)
    {
        return $query->where(['grade_id' => $grade_id])
            ->orderBy('status', 'desc')
            ->orderBy('grade_id', 'desc')
            ->get();
    }

    public function scopeActive($query, $grade_id)
    {
        return $query->select('grade_id')
            ->where(['status' => 1, 'grade_id' => $grade_id])
            ->count();
    }

    public function scopeInactive($query, $grade_id)
    {
        return $query->select('grade_id')
            ->where(['status' => 0, 'grade_id' => $grade_id])
            ->count();
    }
    public function scopeArchived($query, $grade_id)
    {
        return $query->select('grade_id')
            ->where(['status' => 2, 'grade_id' => $grade_id])
            ->count();
    }
}
