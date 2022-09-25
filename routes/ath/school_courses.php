<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\School\CourseController;

// -- Courses
Route::get('school/courses', [CourseController::class, 'index'])->name('school.courses');
Route::get('school/course/create', [CourseController::class, 'create'])->name('school.course.create');
Route::post('school/course/store', [CourseController::class, 'store'])->name('school.course.store');
Route::get('school/course/{name}/edit', [CourseController::class, 'edit'])->name('school.course.edit');
Route::post('school/course/store', [CourseController::class, 'store'])->name('school.course.store');
Route::get('school/course/{name}', [CourseController::class, 'show'])->name('school.course.show');
Route::get('school/course/{name}/delete', [CourseController::class, 'delete'])->name('school.course.delete');
Route::get('school/course/{name}/restore', [CourseController::class, 'restore'])->name('school.course.restore');
Route::get('school/course/{name}/destroy', [CourseController::class, 'destroy'])->name('school.course.destroy');
