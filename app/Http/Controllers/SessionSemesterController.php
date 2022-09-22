<?php

namespace App\Http\Controllers;

use App\Models\sessionSemester;
use App\Http\Requests\StoresessionSemesterRequest; 
use App\Http\Requests\UpdatesessionSemesterRequest;
use Illuminate\Http\Request;

class SessionSemesterController extends Controller
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
     * @param  \App\Http\Requests\StoresessionSemesterRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresessionSemesterRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sessionSemester  $sessionSemester
     * @return \Illuminate\Http\Response
     */
    public function show(sessionSemester $sessionSemester, Request $request)
    {
        if(!$request->held) 
        $request->held="";

        if(!$request->exam_title) 
        $request->exam_title="";

        $sessionSemester->held= $request->held;
        $sessionSemester->exam_title= $request->exam_title;
        $sessionSemester->save();

        return $sessionSemester;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sessionSemester  $sessionSemester
     * @return \Illuminate\Http\Response
     */
    public function edit(sessionSemester $sessionSemester)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesessionSemesterRequest  $request
     * @param  \App\Models\sessionSemester  $sessionSemester
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesessionSemesterRequest $request, sessionSemester $sessionSemester)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sessionSemester  $sessionSemester
     * @return \Illuminate\Http\Response
     */
    public function destroy(sessionSemester $sessionSemester)
    {
        //
    }
}
