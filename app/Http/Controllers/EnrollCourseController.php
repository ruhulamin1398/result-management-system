<?php

namespace App\Http\Controllers;

use App\Models\enrollCourse;
use App\Http\Requests\StoreenrollCourseRequest;
use App\Http\Requests\UpdateenrollCourseRequest;

class EnrollCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('student.course.enroll');
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
    public function edit(enrollCourse $enrollCourse)
    {
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
