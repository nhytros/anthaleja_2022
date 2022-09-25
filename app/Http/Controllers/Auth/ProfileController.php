<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function myProfile()
    {
        $user = Auth::user();
        return view('frontend.profile.user', [
            'user' => $user,
            'character' => $user->character,
            'title' => trans('auth.user.profile.title', ['username' => $user->username]),
        ]);
    }

    public function edit($username)
    {
        //
    }

    public function update(Request $request, $username)
    {
        //
    }
}
