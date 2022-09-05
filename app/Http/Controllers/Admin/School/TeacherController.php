<?php

namespace App\Http\Controllers\Admin\School;

use Illuminate\Http\Request;
use App\Models\School\Teacher;
use App\Http\Controllers\Controller;

class TeacherController extends Controller
{
    public function index()
    {
        return view('admin.school.teachers.index', [
            'title' => __('Teachers'),
            'teachers' => Teacher::with('character')->get(),
            'user' => auth()->user(),
        ]);
    }

    public function create()
    {
        return view('admin.school.teachers.create', [
            'title' => 'Add new teacher',
        ]);
    }

    public function store(Request $request)
    {
        dd($request);
    }
}
