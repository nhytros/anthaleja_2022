<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public $clock;

    public function __construct()
    {
        $this->clock = new \App\Helpers\ATHDateTime();
    }

    public function index()
    {
        return view('frontend.news.home', [
            'title' => 'Anthal News',
            'day' => $this->clock->format('l Y, d/m')
        ]);
    }
}
