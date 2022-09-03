<?php

namespace App\Http\Controllers\School;

use App\Models\User;
use App\Models\Character;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\School\Course;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CourseController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $courses = Course::all();
        $teachers = User::with('character')->role('teacher');
        $students = User::role('student')->get();

        return view('admin.school.courses.index', [
            'title' => 'All courses',
            'user' => $user,
            'courses' => $courses,
            'teachers' => $teachers,
            'students' => $students,
        ]);
    }

    public function create()
    {
        $title = __('Create course');
        $user = Auth::user();
        $courses = Course::all();
        if ($user->can('course')) {
            $teacher = User::role('teacher')->get();
        } else {
            $teacher = Character::where('user_id', $user->id)->firstOrFail();
        }
        $students = User::role('student')->get();
        return view('admin.school.courses.create', compact('title', 'user', 'courses', 'teacher', 'students'));
    }

    public function store(Request $request)
    {
        $schedule = $request->schedule_date . ' ' . $request->schedule_hour . ':' . $request->schedule_mins;
        Course::create([
            'name' => $name = $request->name,
            'slug' => Str::slug($name),
            'teacher_id' => $request->teacher_id,
            'batch_time' => $request->batch_time,
            'schedule' => $schedule,
        ]);
        return Redirect::route('admin.school.courses')
            ->withSuccess(__('Course created'));
    }
}
