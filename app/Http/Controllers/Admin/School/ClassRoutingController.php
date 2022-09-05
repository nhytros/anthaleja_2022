<?php

namespace App\Http\Controllers\Admin\School;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\School\{Day, Grade, Klass, Level, Section, Session, Shift, Subject, Time};

class ClassRoutingController extends Controller
{
    public function index()
    {
        // 
    }

    public function create()
    {
        return view('admin.school.class_routing.create', [
            'title' => 'Class Routing',
            'days' => Day::getActiveDays(),
            'grades' => Grade::getActiveGrades(),
            'levels' => Level::getActiveLevels(),
            'sections' => Section::getActiveSections(),
            'sessions' => Session::getActiveSessions(),
            'shifts' => Shift::getActiveShifts(),
            'classes' => Klass::getActiveClasses(),
            'subjects' => Subject::getActiveSubjects(),
            'times' => Time::getActiveTimes(),
        ]);
    }
}
