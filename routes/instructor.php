<?php

use App\Http\Controllers\Instructor\CourseController;
use Illuminate\Support\Facades\Route;
/*
Route::get('/', function(){
    return view('instructor.dashboard');
}); */

Route::redirect('/', '/instructor/courses')
->name('home');


/* Cursos*/
Route::resource(
    'courses', CourseController ::class
);

Route::get('course/{course}/video', [CourseController::class, 'video'])
->name('courses.video');

Route::get('course/{course}/goals', [CourseController::class, 'goals'])
->name('courses.goals');

Route::get('course/{course}/requirements', [CourseController::class, 'requirements'])
->name('courses.requirements');
/* curriculum */
Route::get('course/{course}/curriculum', [CourseController::class, 'curriculum'])
->name('courses.curriculum');




