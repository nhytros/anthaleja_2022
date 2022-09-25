<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

Route::middleware(['auth', 'role:admin'])->name('admin.')->prefix('admin')
    ->group(function () {
        // Dashboard
        Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

        require_once('admin/roles.php');
        require_once('admin/permissions.php');
    });
