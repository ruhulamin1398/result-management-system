<?php

namespace App\Http\Controllers;

use App\Models\departmentStudySession;
use App\Http\Requests\StoredepartmentStudySessionRequest;
use App\Http\Requests\UpdatedepartmentStudySessionRequest;

class DepartmentStudySessionController extends Controller
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
     * @param  \App\Http\Requests\StoredepartmentStudySessionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoredepartmentStudySessionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\departmentStudySession  $departmentStudySession
     * @return \Illuminate\Http\Response
     */
    public function show(departmentStudySession $departmentStudySession)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\departmentStudySession  $departmentStudySession
     * @return \Illuminate\Http\Response
     */
    public function edit(departmentStudySession $departmentStudySession)
    {
        if ($departmentStudySession->is_open == 0)
            $departmentStudySession->is_open = 1;
        else
            $departmentStudySession->is_open = 0;

        $departmentStudySession->save();

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatedepartmentStudySessionRequest  $request
     * @param  \App\Models\departmentStudySession  $departmentStudySession
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatedepartmentStudySessionRequest $request, departmentStudySession $departmentStudySession)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\departmentStudySession  $departmentStudySession
     * @return \Illuminate\Http\Response
     */
    public function destroy(departmentStudySession $departmentStudySession)
    {
        //
    }
}
