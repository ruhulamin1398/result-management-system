<?php

namespace App\Http\Controllers;

use App\Models\sessionSemesterCourse;
use App\Http\Requests\StoresessionSemesterCourseRequest;
use App\Http\Requests\UpdatesessionSemesterCourseRequest;
use App\Models\course;
use App\Models\department;
use App\Models\semester;
use App\Models\studySession;
use Illuminate\Http\Request;

class SessionSemesterCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $department = department::find($request->department_id);
        $studySession = studySession::find($request->session_id);
        $semester = semester::find($request->semester_id);


        $allCourse = course::where('department_id', $request->department_id)->where('semester_id', $request->semester_id)->get();

        foreach ($allCourse as $course) {
            $isExist = sessionSemesterCourse::where('department_id', $request->department_id)->where('session_id', $request->session_id)->where('semester_id', $request->semester_id)->where('course_id', $course->id)->first();

            if (is_null($isExist)) {
                $sessionSemesterCourse = new  sessionSemesterCourse;
                $sessionSemesterCourse->department_id = $request->department_id;
                $sessionSemesterCourse->session_id = $request->session_id;
                $sessionSemesterCourse->semester_id = $request->semester_id;
                $sessionSemesterCourse->course_id = $course->id;
                $sessionSemesterCourse->save();
            }
        }



        $courses = sessionSemesterCourse::where('department_id', $request->department_id)->where('session_id', $request->session_id)->where('semester_id', $request->semester_id)->get();


        return view('admin.session.semesterCourses', compact('department', 'studySession', 'semester', 'courses'));
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
     * @param  \App\Http\Requests\StoresessionSemesterCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresessionSemesterCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sessionSemesterCourse  $sessionSemesterCourse
     * @return \Illuminate\Http\Response
     */
    public function show(sessionSemesterCourse $sessionSemesterCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sessionSemesterCourse  $sessionSemesterCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(sessionSemesterCourse $sessionSemesterCourse)
    {
        if ($sessionSemesterCourse->is_active == 0)
            $sessionSemesterCourse->is_active = 1;
        else
            $sessionSemesterCourse->is_active = 0;

        $sessionSemesterCourse->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesessionSemesterCourseRequest  $request
     * @param  \App\Models\sessionSemesterCourse  $sessionSemesterCourse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesessionSemesterCourseRequest $request, sessionSemesterCourse $sessionSemesterCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sessionSemesterCourse  $sessionSemesterCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(sessionSemesterCourse $sessionSemesterCourse)
    {
        //
    }
}
