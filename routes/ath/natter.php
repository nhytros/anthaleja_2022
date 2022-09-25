<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NatterController;

Route::group(
    ['middleware' => ['auth']],
    function () {
        // Natter
        Route::get('natter', [NatterController::class, 'index'])->name('natter');
    }
);
