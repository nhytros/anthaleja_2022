<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\{User, Role, Permission};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
    public function index()
    {
        $users = User::with('character')->whereNotIn('username', ['admin'])->withTrashed()->get();
        return view('admin.users.index', [
            'title' => trans('admin.users.manage_users'),
            'users' => $users,
            'roles' => Role::whereNotIn('name', ['admin'])->get(),
        ]);
    }

    public function list_by_role($role)
    {
        $users = User::with('character')->role($role)->withTrashed()->get();

        return view('admin.users.index', [
            'title' => trans('admin.users.list_by_role', ['role' => $role]),
            'users' => $users,
            'srole' => $role,
            'roles' => Role::whereNotIn('name', ['admin'])
                ->orderBy('priority')->orderBy('name')->get(),
        ]);
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

    public function edit($username)
    {
        $user = User::withTrashed()->where('username', $username)->firstOrFail();
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.users.edit', [
            'title' => trans('admin.users.edit_user'),
            'user' => $user,
            'roles' => $roles,
            'permissions' => $permissions,
            // 'userRole' => $user->roles->pluck('name')->toArray(),
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

    public function assignRole(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->assignRole($request->role);
        return Redirect::back();
    }

    public function revokeRole($username, $role)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->removeRole($role);
        return Redirect::back();
    }
    public function assignPermission(Request $request, $username)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->givePermissionTo($request->permission);
        return Redirect::back();
    }

    public function revokePermission($username, $role)
    {
        $user = User::where('username', $username)->firstOrFail();
        $user->removeRole($role);
        return Redirect::back();
    }

    public function delete($username)
    {
        $user = User::withTrashed()->where('username', $username);
        $user->delete();
        return redirect()->back()->with('info', trans('admin.users.deleted'));
    }

    public function restore($username)
    {
        $user = User::withTrashed()->where('username', $username);
        $user->restore();
        return redirect()->back()->with('info', trans('admin.users.restored'));
    }

    public function destroy($username)
    {
        $user = User::withTrashed()->where('username', $username);
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
