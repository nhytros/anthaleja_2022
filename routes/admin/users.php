<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

// Users
Route::get('users', [UserController::class, 'index'])->name('users');
Route::get('users/role/{role}', [UserController::class, 'list_by_role'])->name('users.byrole');
Route::get('users/status', [UserController::class, 'userOnlineStatus'])->name('users.status');
Route::get('user/create', [UserController::class, 'create'])->name('user.create');
Route::post('user/store', [UserController::class, 'store'])->name('user.store');
Route::get('user/{username}/show', [UserController::class, 'show'])->name('user.show');
Route::get('user/{username}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::post('user/{username}/update', [UserController::class, 'update'])->name('user.update');
Route::get('user/{username}/delete', [UserController::class, 'delete'])->name('user.delete');
Route::post('user/{username}/assignRole', [UserController::class, 'assignRole'])->name('user.role.assign');
Route::get('user/{username}/revoke/{role}', [UserController::class, 'revokeRole'])->name('user.role.revoke');
Route::post('user/{username}/assignPermission', [UserController::class, 'assignPermission'])->name('user.permission.assign');
Route::get('user/{username}/revoke/{permission}', [UserController::class, 'revokePermission'])->name('user.permission.revoke');
Route::get('user/{username}/restore', [UserController::class, 'restore'])->name('user.restore');
Route::get('user/{username}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
