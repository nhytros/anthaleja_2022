<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Roles\RoleController;

// Roles
Route::get('roles/{name?}', [RoleController::class, 'index'])->name('roles');
Route::post('role/store', [RoleController::class, 'store'])->name('role.store');
Route::get('role/{name}/edit', [RoleController::class, 'index'])->name('role.edit');
Route::post('role/{name}/update', [RoleController::class, 'update'])->name('role.update');
Route::post('role/{name}/permission', [RoleController::class, 'givePermission'])->name('role.permissions');
Route::get('role/{name}/permission/revoke/{permission}', [RoleController::class, 'revokePermission'])->name('role.permission.revoke');
Route::get('role/{name}/delete', [RoleController::class, 'delete'])->name('role.delete');
Route::get('role/{name}/restore', [RoleController::class, 'restore'])->name('role.restore');
Route::get('role/{name}/destroy', [RoleController::class, 'destroy'])->name('role.destroy');
