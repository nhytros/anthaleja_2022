<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Frontier\LoginRequest;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function dashboard()
    {
        return view('admin.dashboard', [
            'title' => 'Admin Dashboard',
        ]);
    }

    public function login()
    {
        return view('admin.auth.login', [
            'title' => 'Administrator Login',
        ]);
    }

    public function postLogin(LoginRequest $request)
    {
        if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect('admin/dashboard');
        } else {
            return redirect()->back()->with('danger', trans('auth.failed'));
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
