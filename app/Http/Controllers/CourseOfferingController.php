<?php

namespace App\Http\Controllers;

use App\Models\courseOffering;
use App\Http\Requests\StorecourseOfferingRequest;
use App\Http\Requests\UpdatecourseOfferingRequest;

use Illuminate\Http\Request;

class CourseOfferingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        return $request;
        $courseOffering = courseOffering::where('department_id',$request->department_id)->where('department_id',$request->department_id)->first();
        
        return view('admin.courseOffering.index',compact('courseOffering'));
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
     * @param  \App\Http\Requests\StorecourseOfferingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorecourseOfferingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\courseOffering  $courseOffering
     * @return \Illuminate\Http\Response
     */
    public function show(courseOffering $courseOffering)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\courseOffering  $courseOffering
     * @return \Illuminate\Http\Response
     */
    public function edit(courseOffering $courseOffering)
    {
       ///
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatecourseOfferingRequest  $request
     * @param  \App\Models\courseOffering  $courseOffering
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatecourseOfferingRequest $request, courseOffering $courseOffering)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\courseOffering  $courseOffering
     * @return \Illuminate\Http\Response
     */
    public function destroy(courseOffering $courseOffering)
    {
        //
    }
}
