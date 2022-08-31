<?php

namespace App\Http\Controllers\Admin\Roles;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class PermissionController extends Controller
{
    public function index($name = null)
    {
        return view('admin.rol_perm.perm_index', [
            'title' => __('Permissions'),
            'permissions' => Permission::withTrashed()->get(),
            'roles' => Role::withTrashed()->whereNotIn('name', ['admin'])->get(),
            'permission' => ($name) ? Permission::withTrashed()->where('name', $name)->firstOrFail() : null,
            'edit' => ($name) ? true : false,
        ]);
    }

    public function store(Request $request)
    {
        $request->name = strtolower($request->name);
        $request->validate([
            'name' => ['required', 'min:3', 'unique:roles,name'],
        ]);
        Permission::create([
            'name' => strtolower($request->name),
        ]);
        return Redirect::route('admin.permissions')->withSuccess(trans('admin.permission.created_ok'));
    }

    public function update(Request $request, $name)
    {
        $request->name = strtolower($request->name);
        $name = strtolower($name);
        $request->validate([
            'name' => ['required', 'min:3', 'unique:permissions,name'],
        ]);
        $permission = Permission::where('name', $name)->firstOrFail();
        $permission->update([
            'name' => strtolower($request->name),
        ]);
        return Redirect::route('admin.permissions')->withSuccess(trans('admin.permission.updated_ok'));
    }

    public function assignRole(Request $request, $name)
    {
        $permission = Permission::where('name', $name)->firstOrFail();
        if ($permission->hasRole($request->role)) {
            return Redirect::back()->withWarning(trans('admin.permission.role.exist'));
        }
        $permission->assignRoleTo($request->role);
        return Redirect::back()->withSuccess(trans('admin.permission.role.added'));
    }

    public function removeRole($permission, $role)
    {
        $permission = Permission::where('name', $permission)->firstOrFail();
        $role = Role::where('name', $role)->firstOrFail();
        // dd($role, $permission);

        if (!$permission->hasRole($role)) {
            return Redirect::back()->withWarning(trans('admin.permission.role.not_exist'));
        }
        $permission->removeRole($role);
        return Redirect::back()->withSuccess(trans('admin.permission.role.removed'));
    }


    public function delete($name)
    {
        $permission = Permission::where('name', strtolower($name))->firstOrFail();
        $permission->delete();
        return Redirect::route('admin.permissions')->withSuccess(trans('admin.permission.deleted_ok'));
    }
    public function restore($name)
    {
        $permission = Permission::where('name', strtolower($name))->withTrashed()->firstOrFail();
        $permission->restore();
        return Redirect::route('admin.permissions')->withSuccess(trans('admin.permission.restored_ok'));
    }
    public function destroy($name)
    {
        $permission = Permission::where('name', strtolower($name))->withTrashed()->firstOrFail();
        $permission->forceDelete();
        return Redirect::route('admin.permissions')->withSuccess(trans('admin.permission.destroyed_ok'));
    }
}
