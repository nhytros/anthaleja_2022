<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Frontier\PasswordRequest;
use Illuminate\Support\Facades\{Auth,Hash,Redirect};


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

    public function settings(){
        return view('frontend.profile.settings',[
            'user'=>$user=Auth::user(),
            'character'=>$user->character,
            'title'=>trans('auth.user.profile.title',['username'=>$user->username]),
        ]);
    }

    public function postPassword(PasswordRequest $request)
    {
        dd($request);
        User::find(Auth::id())->update(['password' => Hash::make($request->new_password, ['rounds' => 12])]);
        return Redirect::back()->withSuccess('frontier.password.updated_ok');
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
