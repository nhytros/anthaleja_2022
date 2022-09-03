<?php

namespace App\Http\Controllers\School;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\School\Student;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index()
    {
        return view('admin.school.students.index', [
            'title' => __('Students'),
            'students' => Student::with('character')->get(),
            'user' => auth()->user(),
        ]);
    }

    public function create()
    {
        return view('admin.school.students.create', [
            'title' => 'Add new student',
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
