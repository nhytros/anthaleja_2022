<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NatterController extends Controller
{
    public function index()
    {
        return view('frontend.natter.index');
    }
}
