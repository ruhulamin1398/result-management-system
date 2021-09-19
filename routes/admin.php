<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\StudentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 Route::get("/",function(){
     return view('admin.index');

 })->name('admin');

 Route::resource('departments', DepartmentController::class);
 Route::resource('semesters', SemesterController::class);
 Route::resource('students', StudentController::class);
 Route::resource('courses', CourseController::class);
 