<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Portfolio\SkillController;
use App\Http\Controllers\Portfolio\ProjectController;

Route::group(
    ['middleware' => ['auth']],
    function () {
        // Portfolio -> Skills
        Route::get('portfolio/skills', [SkillController::class, 'index'])->name('portfolio.skills');
        Route::get('portfolio/skill/create', [SkillController::class, 'create'])->name('portfolio.skill.create');
        Route::post('portfolio/skill/store', [SkillController::class, 'store'])->name('portfolio.skill.store');
        Route::get('portfolio/skill/{id}/show', [SkillController::class, 'show'])->name('portfolio.skill.show');
        Route::get('portfolio/skill/{id}/edit', [SkillController::class, 'edit'])->name('portfolio.skill.edit');
        Route::post('portfolio/skill/{id}/update', [SkillController::class, 'update'])->name('portfolio.skill.update');
        Route::get('portfolio/skill/{id}/delete', [SkillController::class, 'delete'])->name('portfolio.skill.delete');
        Route::get('portfolio/skill/{id}/restore', [SkillController::class, 'restore'])->name('portfolio.skill.restore');
        Route::get('portfolio/skill/{id}/destroy', [SkillController::class, 'destroy'])->name('portfolio.skill.destroy');

        // Portfolio -> Projects
        Route::get('portfolio/projects', [ProjectController::class, 'index'])->name(' d');
        Route::get('portfolio/project/create', [ProjectController::class, 'create'])->name('portfolio.project.create');
        Route::post('portfolio/project/store', [ProjectController::class, 'store'])->name('portfolio.project.store');
        Route::get('portfolio/project/{id}/show', [ProjectController::class, 'show'])->name('portfolio.project.show');
        Route::get('portfolio/project/{id}/edit', [ProjectController::class, 'edit'])->name('portfolio.project.edit');
        Route::post('portfolio/project/{id}/update', [ProjectController::class, 'update'])->name('portfolio.project.update');
        Route::get('portfolio/project/{id}/delete', [ProjectController::class, 'delete'])->name('portfolio.project.delete');
        Route::get('portfolio/project/{id}/restore', [ProjectController::class, 'restore'])->name('portfolio.project.restore');
        Route::get('portfolio/project/{id}/destroy', [ProjectController::class, 'destroy'])->name('portfolio.project.destroy');
    }
);
