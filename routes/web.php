<?php

use App\Http\Controllers\StudentProfileController;
use App\Models\result;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Auth;
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



Route::group(['middleware' => 'auth'], function () {

    Route::get('/', function () {
        
        if( Auth::user()->hasRole('admin')){
            return redirect(route('admin'));
        }
        return redirect(route('student_profiles.index'));
 


    })->name('index');
    
});




Route::group(['middleware' => ['role:student','auth:sanctum']], function () {

   
    Route::resource('student_profiles', StudentProfileController::class);
});
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

