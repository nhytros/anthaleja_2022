<?php

namespace App\Http\Controllers\Auth;

use Faker\Factory;
use Illuminate\Support\Str;
// use App\Services\RememberMeExpiration;
use Illuminate\Http\Request;
use App\Models\Natter\Channel;
use App\Models\{Character, User};
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\{Auth, Hash, Redirect};
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
        $faker = Factory::create();

        $u = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password, ['rounds' => 12]),
        ]);

        $c = Character::create([
            'user_id' => $u->id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->c_username,
            'gender' => $request->gender,
            'height' => $request->height,
            'date_of_birth' => $request->date_of_birth,
            'bank_account' => 'ATH-' . $faker->unique()->numberBetween(11111111, 33333333),
            'has_phone' => true,
            'phone_no' => $faker->unique()->numerify('###-####'),
        ]);

        if ($request->social) {
            $ch = Channel::create([
                'character_id' => $c->id,
                'name' => $name = $c->username . ' Channel',
                'description' => 'This is ' . $c->username . ' channel',
                'uid' => $uid = $faker->unique()->ean13(),
                'slug' => Str::slug($name),
                'image_avatar' => $faker->imageUrl(256, 256, null, true, $c->username, false, 'png'),
                'image_banner' => $faker->imageUrl(1920, 400, null, true, $c->username, false, 'png'),
            ]);
        }
        return Redirect::route('frontier.login')->withSuccess('frontier.register_ok');
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
