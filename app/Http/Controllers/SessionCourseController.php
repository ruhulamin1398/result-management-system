<?php

namespace App\Http\Controllers;

use App\Models\sessionCourse;
use App\Http\Requests\StoresessionCourseRequest;
use App\Http\Requests\UpdatesessionCourseRequest;

class SessionCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoresessionCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresessionCourseRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sessionCourse  $sessionCourse
     * @return \Illuminate\Http\Response
     */
    public function show(sessionCourse $sessionCourse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sessionCourse  $sessionCourse
     * @return \Illuminate\Http\Response
     */
    public function edit(sessionCourse $sessionCourse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesessionCourseRequest  $request
     * @param  \App\Models\sessionCourse  $sessionCourse
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesessionCourseRequest $request, sessionCourse $sessionCourse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sessionCourse  $sessionCourse
     * @return \Illuminate\Http\Response
     */
    public function destroy(sessionCourse $sessionCourse)
    {
        //
    }
}
