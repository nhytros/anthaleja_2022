<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\UserStoreRequest;

class UserController extends Controller
{
    public function index()
    {
        return view('admin.users.index', ['title' => trans('admin.users.manage_users')]);
    }

    public function create()
    {
        return view('admin.users.create', ['title' => trans('admin.users.create_user')]);
    }

    public function store(User $user, UserStoreRequest $request)
    {
        $user->create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
        ]);
        return redirect('admin/dashboard')->withSuccess(trans('admin.user.created_ok'));
    }

    public function show($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return view('admin.users.show', [
            'title' => trans('admin.users.edit_user'),
            'user' => $user,
        ]);
    }

    public function edit($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        return view('admin.users.edit', [
            'title' => trans('admin.users.edit_user'),
            'user' => $user,
            'userRole' => $user->roles->pluck('name')->toArray(),
            // 'roles' => Role::latest()->get(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->update($request->validated());
        $user->syncRoles($request->get('role'));
        return redirect('admin/dashboard')->withSuccess(trans('admin.user.updated_ok'));
    }

    public function delete($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->delete();
        return redirect()->back()->with('info', trans('admin.users.deleted'));
    }

    public function restore($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->restore();
        return redirect()->back()->with('info', trans('admin.users.restored'));
    }

    public function destroy($id)
    {
        $user = User::withTrashed()->findOrFail($id);
        $user->forceDelete();
        return redirect()->back()->with('info', trans('admin.users.destroyed'));
    }

    public function userOnlineStatus()
    {
        $users = User::all();
        foreach ($users as $user) {
            if (Cache::has('user-is-online-' . $user->id)) {
                echo $user->name . trans('frontier.online') . "<br>";
            } else {
                echo $user->name . trans('frontier.offline') . Carbon::parse($user->last_seen)->diffForHumans() ?? __('Never') . " <br>";
            }
        }
    }
}
