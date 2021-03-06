<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\department;
use App\Models\semester;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $courses= course::where('semester_id',$request->semester_id)->where('department_id',$request->department_id)->get();
        $semester=  semester::find($request->semester_id);
        $department=  department::find($request->department_id);
        return view('admin.course.index',compact('courses','department','semester'));

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $course = new course;
      $course->course_code = $request->course_code;
      $course->title = $request->title;
      $course->type = $request->type;
      $course->credit = $request->credit;
      $course->marks = $request->marks;
      $course->semester_id = $request->semester_id;
      $course->department_id = $request->department_id;
      $course->save();
      return back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(course $course)
    {
        return view('admin.course.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, course $course)
    {
        $course->course_code = $request->course_code;
        $course->title = $request->title;
        $course->type = $request->type;
        $course->credit = $request->credit;
        $course->marks = $request->marks;
        $course->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(course $course)
    {
       ////////
    }
}
