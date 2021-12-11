<?php

namespace App\Http\Controllers;

use App\Models\enrollCourse;
use App\Http\Requests\StoreenrollCourseRequest;
use App\Http\Requests\UpdateenrollCourseRequest;
use App\Models\courseOffering;
use App\Models\result;
use App\Models\semester;
use App\Models\sessionSemesterCourse;
use Illuminate\Support\Facades\Auth;

class EnrollCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user()->profile;
        $courseOffering = courseOffering::where('department_id', $profile->department_id)->where('session_id', $profile->session_id)->where('is_open', 1)->first();
        $availableCourses = sessionSemesterCourse::where('department_id', $profile->department_id)->where('session_id', $profile->session_id)->where('semester_id', $courseOffering->semester_id)->where('is_Active', 1)->get();


        foreach ($availableCourses as $course) {
            $isExist = result::where('semester_id', $courseOffering->semester_id)->where('student_id', $profile->id)->where('course_id', $course->course_id)->first();

            if (is_null($isExist)) {
                $result = new  result;
                $result->semester_id = $courseOffering->semester_id;
                $result->course_id = $course->course_id;
                $result->student_id = $profile->id;
                $result->is_drop = 0;
                $result->save();
            }
        }

        $results = result::where('semester_id', $courseOffering->semester_id)->where('student_id', $profile->id)->get();


        return view('student.course.enroll', compact('availableCourses', 'results'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreenrollCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreenrollCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\enrollCourse  $enrollCourse
     * @return \Illuminate\Http\Response
     */
    public function show(enrollCourse $enrollCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\enrollCourse  $enrollCourse
     * @return \Illuminate\Http\Response
     */
    public function edit($enrollCourse)
    {
        $result = result::find($enrollCourse);
        if ($result->is_registered == 0)
            $result->is_registered = 1;
        else
            $result->is_registered = 0;
        $result->save();
        return back();
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateenrollCourseRequest  $request
     * @param  \App\Models\enrollCourse  $enrollCourse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateenrollCourseRequest $request, enrollCourse $enrollCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\enrollCourse  $enrollCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(enrollCourse $enrollCourse)
    {
        //
    }
}
