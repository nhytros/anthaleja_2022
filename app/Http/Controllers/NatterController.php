<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Natter\Channel;
use Illuminate\Support\Facades\Auth;

class NatterController extends Controller
{
    public function index()
    {
        if (Auth::check() && Auth::user()->character->channel) {
            $channel = Channel::where('character_id', Auth::user()->character->id)->firstOrFail();
        }
        return view('frontend.natter.index', [
            'title' => __('The community of Anthal'),
            'channel' => $channel ?? false,
        ]);
    }
}
