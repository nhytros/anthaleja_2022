<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Services\RememberMeExpiration;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Frontier\{LoginRequest, RegisterRequest, PasswordRequest};

class FrontierController extends Controller
{
    // use RememberMeExpiration;
    // use AuthenticatesUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'password']);
        $this->redirectTo = url()->previous();
    }


    public function login()
    {
        if (Auth::viaRemember()) {
            return redirect()->route('home')->with('success', trans('frontier.enter_city_ok'));
        }
        return view('frontier.login', [
            'title' => trans('frontier.enter_city'),
        ]);
    }

    public function postLogin(LoginRequest $request)
    {
        $input = $request->all();
        $user = User::where('username', $request->username)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user, $request->remember);
                if (Auth::user()->type == 'admin') {
                    return redirect()->route('admin.dashboard');
                } elseif (Auth::user()->type == 'vendor') {
                    return redirect()->route('admin.dashboard');
                } else {
                    return redirect()->route('home')->withSuccess(trans('frontier.enter_city_ok'));
                }
            } else {
                return redirect()->back()->withDanger(trans('frontier.error.password.wrong'));
            }
        } else {
            return redirect()->back()->withDanger(trans('frontier.error.username.not_present'))
                ->onlyInput('username');
        }
    }

    public function postRegister(RegisterRequest $request)
    {
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password, ['rounds' => 12]),
        ]);
        return redirect()->route('frontier.login')
            ->withSuccess(trans('frontier.register_ok'));
    }

    public function password()
    {
        return view('frontier.password', [
            'title' => trans('frontier.change_password'),
        ]);
    }

    public function postPassword(PasswordRequest $request)
    {
        User::find(Auth::id())->update(['password' => bcrypt($request->new_password, ['rounds' => 12])]);
        return redirect()->back()->withSuccess('frontier.password.updated_ok');
    }

    public function logout(Request $request)
    {
        $this->middleware(['auth']);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()
            ->route('frontier.login')
            ->withSuccess(trans('frontier.leave_city_ok'));
    }
}
