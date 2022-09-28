<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\FrontierController;
// use App\Http\Controllers\Admin\AdminController;

Route::group(['middleware' => ['guest']], function () {
    Route::view('frontier', 'frontend.frontier.index', ['title' => trans('frontier.title')])->name('frontier');
    Route::view('frontier/register', 'frontend.frontier.register', ['title' => trans('frontier.register_office')])->name('frontier.register');
    Route::post('frontier/postRegister', [FrontierController::class, 'postRegister'])->name('frontier.postRegister');
    Route::view('frontier/login', 'frontend.frontier.login', ['title' => trans('frontier.enter_city')])->name('frontier.login');
    Route::post('frontier/postLogin', [FrontierController::class, 'postLogin'])->name('frontier.postLogin');

    // Route::get('admin/login', [AdminController::class, 'login'])->name('admin.login');
    // Route::post('admin/postLogin', [AdminController::class, 'postLogin'])->name('admin.postLogin');
});

Route::group(['middleware' => ['auth']], function () {
    // Authentication
    Route::post('profile/postPassword', [ProfileController::class, 'postPassword'])->name('profile.postPassword');
    Route::get('frontier/logout', [FrontierController::class, 'logout'])->name('frontier.logout');
});
