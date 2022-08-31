<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\Shop\BrandController;

Route::get('admin', function () {
    return redirect('admin/dashboard');
});

Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::get('admin/users', [UserController::class, 'index'])->name('admin.users');
Route::get('admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('admin/users/store', [UserController::class, 'store'])->name('admin.users.store');
Route::get('admin/users/{id}/show', [UserController::class, 'show'])->name('admin.users.show');
Route::get('admin/users/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::post('admin/users/{id}/update', [UserController::class, 'update'])->name('admin.users.update');
Route::get('admin/users/{id}/delete', [UserController::class, 'delete'])->name('admin.users.delete');
Route::get('admin/users/{id}/restore', [UserController::class, 'restore'])->name('admin.users.restore');
Route::get('admin/users/{id}/destroy', [UserController::class, 'destroy'])->name('admin.users.destroy');

// Shop
// -- Brands
Route::get('admin/brands', [BrandController::class, 'index'])->name('admin.brands');
