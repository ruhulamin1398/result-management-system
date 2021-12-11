<?php

namespace App\Http\Controllers;

use App\Models\courseOffering;
use App\Http\Requests\StorecourseOfferingRequest;
use App\Http\Requests\UpdatecourseOfferingRequest;
use App\Models\department;
use App\Models\semester;
use App\Models\sessionCourse;
use App\Models\studySession;
use Illuminate\Http\Request;

class CourseOfferingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $department = department::find($request->department_id);
        $sessions = studySession::all();
        $semesters = semester::all();


        foreach ($sessions as $session) {
            foreach ($semesters as $semester) {



                $isExist = courseOffering::where('department_id', $request->department_id)->where('session_id', $session->id)->where('semester_id', $semester->id)->first();



                if (is_null($isExist)) {
                    $courseOffering = new  courseOffering;
                    $courseOffering->department_id = $request->department_id;
                    $courseOffering->session_id = $session->id;
                    $courseOffering->semester_id = $semester->id;
                    $courseOffering->save();
                }
            }
        }



        $courseOffering = courseOffering::where('department_id', $request->department_id)->get()->groupBy('session_id');
        // return compact('courseOffering','department','sessions','semesters');

        return view('admin.courseOffering.index', compact('courseOffering', 'department', 'sessions', 'semesters'));
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
        if ($courseOffering->is_open == 0)
            $courseOffering->is_open = 1;
        else
            $courseOffering->is_open = 0;
        $courseOffering->save();
        return back();
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
