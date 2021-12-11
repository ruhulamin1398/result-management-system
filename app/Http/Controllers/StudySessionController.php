<?php

namespace App\Http\Controllers;

use App\Models\courseOffering;
use App\Models\department;
use App\Models\departmentStudySession;
use App\Models\studySession;
use Illuminate\Http\Request;

class StudySessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request )
    {

        $department  = department::find($request->department_id);
   
        // $studySessions = studySession::orderBy('id', 'desc')->get();
        

        //  return $department->studySessions;
 
        return view('admin.studySession.index',compact('department'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $studySessions = studySession::orderBy('id', 'desc')->get();
        return view('admin.session.create',compact('studySessions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $studySessions = new studySession;
        $studySessions->title = $request->title;
        $studySessions->save();

        $departmentStudySession = new departmentStudySession;
        $departmentStudySession->department_id = 1;
        $departmentStudySession->session_id = $studySessions->id;
        $departmentStudySession->save();

        $departmentStudySession = new departmentStudySession;
        $departmentStudySession->department_id = 2;
        $departmentStudySession->session_id = $studySessions->id;
        $departmentStudySession->save();

        $departmentStudySession = new departmentStudySession;
        $departmentStudySession->department_id = 3;
        $departmentStudySession->session_id = $studySessions->id;
        $departmentStudySession->save();
        




       


     
        return redirect(route('study_sessions.create'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\studySession  $studySession
     * @return \Illuminate\Http\Response
     */
    public function show(studySession $studySession)
    {
        /////
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\studySession  $studySession
     * @return \Illuminate\Http\Response
     */
    public function edit(studySession $studySession)
    {
        return view('admin.session.edit',compact('studySession'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\studySession  $studySession
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, studySession $studySession)
    {
       
        $studySession->title = $request->title;
        $studySession->save();
        return redirect(route('study_sessions.create'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\studySession  $studySession
     * @return \Illuminate\Http\Response
     */
    public function destroy(studySession $studySession)
    {
        //
    }
}
