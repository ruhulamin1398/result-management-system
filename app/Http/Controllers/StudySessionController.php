<?php

namespace App\Http\Controllers;

use App\Models\department;
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
   
        $studySessions = studySession::orderBy('id', 'desc')->get();
        // return $studySessions;
 
        return view('admin.studySession.index',compact('studySessions','department'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\studySession  $studySession
     * @return \Illuminate\Http\Response
     */
    public function show(studySession $studySession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\studySession  $studySession
     * @return \Illuminate\Http\Response
     */
    public function edit(studySession $studySession)
    {
        //
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
        //
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
