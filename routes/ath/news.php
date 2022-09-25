<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::group(
    ['middleware' => ['auth']],
    function () {
        Route::get('news', [NewsController::class, 'index'])->name('news');
    }
);
