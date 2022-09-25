<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\School\TeacherController;

// -- Teachers
Route::get('school/teachers', [TeacherController::class, 'index'])->name('school.teachers');
Route::get('school/teacher/add', [TeacherController::class, 'create'])->name('school.teacher.add');
Route::post('school/teacher/store', [TeacherController::class, 'store'])->name('school.teacher.store');
Route::get('school/teacher/{id}/show', [TeacherController::class, 'show'])->name('school.teacher.show');
Route::get('school/teacher/{id}/edit', [TeacherController::class, 'edit'])->name('school.teacher.edit');
Route::post('school/teacher/{id}/update', [TeacherController::class, 'update'])->name('school.teacher.update');
Route::get('school/teacher/{id}/delete', [TeacherController::class, 'delete'])->name('school.teacher.delete');
Route::get('school/teacher/{id}/restore', [TeacherController::class, 'restore'])->name('school.teacher.restore');
Route::get('school/teacher/{id}/destroy', [TeacherController::class, 'destroy'])->name('school.teacher.destroy');
