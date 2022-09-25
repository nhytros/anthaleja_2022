<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Roles\PermissionController;

// Permissions
Route::get('permissions/{name?}', [PermissionController::class, 'index'])->name('permissions');
Route::post('permission/store', [PermissionController::class, 'store'])->name('permission.store');
Route::get('permission/{name}/edit', [PermissionController::class, 'index'])->name('permission.edit');
Route::post('permission/{name}/update', [PermissionController::class, 'update'])->name('permission.update');
Route::post('permission/{name}/role/assign', [PermissionController::class, 'assignRole'])->name('permission.roles');
Route::get('permission/{name}/role/{role}/remove', [PermissionController::class, 'removeRole'])->name('permission.role.remove');
Route::get('permission/{name}/delete', [PermissionController::class, 'delete'])->name('permission.delete');
Route::get('permission/{name}/restore', [PermissionController::class, 'restore'])->name('permission.restore');
Route::get('permission/{name}/destroy', [PermissionController::class, 'destroy'])->name('permission.destroy');
