<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Models\{Role, Permission};
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class RoleController extends Controller
{
    public function index($name = null)
    {
        return view('admin.rol_perm.roles_index', [
            'title' => __('Roles'),
            'roles' => Role::withTrashed()->whereNotIn('name', ['admin'])->get(),
            'role' => ($name) ? Role::withTrashed()->where('name', $name)->firstOrFail() : null,
            'permissions' => Permission::all(),
            'edit' => ($name) ? true : false,
        ]);
    }

    public function store(Request $request)
    {
        $request->name = strtolower($request->name);
        $request->validate([
            'name' => ['required', 'min:3', 'unique:roles,name'],
        ]);
        Role::create([
            'name' => strtolower($request->name),
        ]);
        return Redirect::route('admin.roles')->withSuccess(trans('admin.role.created_ok'));
    }

    public function update(Request $request, $name)
    {
        $request->name = strtolower($request->name);
        $name = strtolower($name);
        $request->validate([
            'name' => ['required', 'min:3', 'unique:roles,name'],
        ]);
        $role = Role::where('name', $name)->firstOrFail();
        $role->update([
            'name' => strtolower($request->name),
        ]);
        return Redirect::route('admin.roles')->withSuccess(trans('admin.role.updated_ok'));
    }

    public function givePermission(Request $request, $name)
    {
        $role = Role::where('name', $name)->firstOrFail();
        if ($role->hasPermissionTo($request->permission)) {
            return Redirect::back()->withWarning(trans('admin.role.permission.exist'));
        }
        $role->givePermissionTo($request->permission);
        return Redirect::back()->withSuccess(trans('admin.role.permission.added'));
    }

    public function revokePermission($role, $permission)
    {
        $role = Role::where('name', $role)->firstOrFail();
        $permission = Permission::where('name', $permission)->firstOrFail();
        // dd($role, $permission);

        if (!$role->hasPermissionTo($permission)) {
            return Redirect::back()->withWarning(trans('admin.role.permission.not_exist'));
        }
        $role->revokePermissionTo($permission);
        return Redirect::back()->withSuccess(trans('admin.role.permission.revoked'));
    }

    public function delete($name)
    {
        $role = Role::where('name', strtolower($name))->firstOrFail();
        $role->delete();
        return Redirect::route('admin.roles')->withSuccess(trans('admin.role.deleted_ok'));
    }
    public function restore($name)
    {
        $role = Role::where('name', strtolower($name))->withTrashed()->firstOrFail();
        $role->restore();
        return Redirect::route('admin.roles')->withSuccess(trans('admin.role.restored_ok'));
    }
    public function destroy($name)
    {
        $role = Role::where('name', strtolower($name))->withTrashed()->firstOrFail();
        $role->forceDelete();
        return Redirect::route('admin.roles')->withSuccess(trans('admin.role.destroyed_ok'));
    }
}
