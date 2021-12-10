<?php

namespace App\Http\Controllers;

use App\Models\sessionSemesterCourse;
use App\Http\Requests\StoresessionSemesterCourseRequest;
use App\Http\Requests\UpdatesessionSemesterCourseRequest;
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
        $semester = semester::all();
        $department = department::find( $request->department_id);
        $studySession = studySession::find( $request->department_id);

        return view('admin.session.semester',compact('department','studySession','semester'));
    
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
        //
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
