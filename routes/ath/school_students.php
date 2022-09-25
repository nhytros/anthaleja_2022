<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\School\StudentController;

// -- Students
Route::get('school/students', [StudentController::class, 'index'])->name('school.students');
Route::get('school/student/add', [StudentController::class, 'create'])->name('school.student.add');
Route::post('school/student/store', [StudentController::class, 'store'])->name('school.student.store');
Route::get('school/student/{id}/show', [StudentController::class, 'show'])->name('school.student.show');
Route::get('school/student/{id}/edit', [StudentController::class, 'edit'])->name('school.student.edit');
Route::post('school/student/{id}/update', [StudentController::class, 'update'])->name('school.student.update');
Route::get('school/student/{id}/delete', [StudentController::class, 'delete'])->name('school.student.delete');
Route::get('school/student/{id}/restore', [StudentController::class, 'restore'])->name('school.student.restore');
Route::get('school/student/{id}/destroy', [StudentController::class, 'destroy'])->name('school.student.destroy');
