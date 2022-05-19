<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\CourseOfferingController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DepartmentStudySessionController;
use App\Http\Controllers\FieldController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SessionSemesterCourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudySessionController;
use Barryvdh\DomPDF\Facade\Pdf;
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

    //
 Route::get("/",function(){
     return view('admin.index');

 })->name('admin');

 Route::resource('departments', DepartmentController::class);
 Route::resource('semesters', SemesterController::class);
 Route::resource('students', StudentController::class);
 Route::resource('courses', CourseController::class); 
 Route::resource('study_sessions', StudySessionController::class);
 Route::resource('department_study_sessions', DepartmentStudySessionController::class);
 Route::resource('results', ResultController::class);
 Route::resource('session_semester_courses', SessionSemesterCourseController::class);

 
 Route::resource('course-offerings', CourseOfferingController::class);
 Route::resource('fields', FieldController::class);
 
 Route::get('download/student/{id}',function(){


    $pdf = PDF::loadView('pdf.result');
    return $pdf->download('invoice.pdf');
})->name('downloadStudentPdf');
 
