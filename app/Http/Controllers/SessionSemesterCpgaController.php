<?php

namespace App\Http\Controllers;

use App\Models\sessionSemesterCpga;
use App\Http\Requests\StoresessionSemesterCpgaRequest;
use App\Http\Requests\UpdatesessionSemesterCpgaRequest;
use App\Models\department;
use App\Models\result;
use App\Models\studySession;
use Illuminate\Http\Request;

class SessionSemesterCpgaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {


        if ($request->year  == 1) {

            $title  = '1stYear_Semester GPA & CGPA ';


            /// calculation for first semester
            $semesterId = 1;
            $students = result::where('session_id', $request->session_id)
                ->where('department_id', $request->department_id)
                ->where('session_id', $request->session_id)
                ->where('semester_id',  $semesterId)
                ->get()
                ->groupBy('student_id');


            foreach ($students as  $results) {
              
                $points = 0;
                $completed_credit = 0;
                $semesterCredit = 0;

                foreach ($results as $result) {

                    $semesterCredit += $result->course->credit;

                    if ($result->point != 0) {

                        $points += $result->point * $result->course->credit;
                        $completed_credit += $result->course->credit;
                    }
                }

                $gpa = $points / $completed_credit;

                $sessionsemestercgpa = sessionSemesterCpga::where('department_id', $request->department_id)
                ->where('session_id', $request->session_id)
                ->where('semester_id', $semesterId)
                ->where('student_id', $results->first()->student_id)
 
                ->first();
                if (is_null($sessionsemestercgpa)) {
                    $sessionsemestercgpa = new sessionSemesterCpga();
                }
                $sessionsemestercgpa->department_id = $request->department_id;
                $sessionsemestercgpa->session_id = $request->session_id;
                $sessionsemestercgpa->semester_id = $semesterId;
                $sessionsemestercgpa->student_id = $results->first()->student_id;
                $sessionsemestercgpa->GPA = $gpa;
                $sessionsemestercgpa->semester_credit = $semesterCredit;
                $sessionsemestercgpa->completed_credit = $completed_credit;


                $sessionsemestercgpa->total_credit = $semesterCredit;
                $sessionsemestercgpa->CGPA = $gpa;



                $sessionsemestercgpa->save();
            }


            
            /// calculation for 2nd semester
            $semesterId = 2;
            $students = result::where('session_id', $request->session_id)
                ->where('department_id', $request->department_id)
                ->where('session_id', $request->session_id)
                ->where('semester_id',  $semesterId)
                ->get()
                ->groupBy('student_id');


            foreach ($students as  $results) {
                $points = 0;
                $completed_credit = 0;
                $semesterCredit = 0;

                foreach ($results as $result) {

                    $semesterCredit += $result->course->credit;

                    if ($result->point != 0) {

                        $points += $result->point * $result->course->credit;
                        $completed_credit += $result->course->credit;
                    }
                }

                $gpa = $points / $completed_credit;

                $sessionsemestercgpa = sessionSemesterCpga::where('department_id', $request->department_id)
                ->where('session_id', $request->session_id)
                ->where('semester_id', $semesterId)
                
                ->where('student_id', $results->first()->student_id)
                ->first();
                if (is_null($sessionsemestercgpa)) {
                    $sessionsemestercgpa = new sessionSemesterCpga();
                }
                $sessionsemestercgpa->department_id = $request->department_id;
                $sessionsemestercgpa->session_id = $request->session_id;
                $sessionsemestercgpa->semester_id = $semesterId;
                $sessionsemestercgpa->student_id = $results->first()->student_id;
                $sessionsemestercgpa->GPA = $gpa;
                $sessionsemestercgpa->completed_credit = $completed_credit;

                $sessionsemestercgpa->semester_credit = $semesterCredit;



                $previousResults = sessionSemesterCpga::where('department_id', $request->department_id)->where('session_id', $request->session_id)->where('semester_id', '<=', $semesterId - 1)->first();
                $completed_credit = $previousResults->completed_credit + $completed_credit;
                $CGPA = (($previousResults->completed_credit * $previousResults->CGPA) + $points) / $completed_credit;
                $sessionsemestercgpa->CGPA = $CGPA;


                $sessionsemestercgpa->total_credit = $semesterCredit +  $previousResults->completed_credit;
                $sessionsemestercgpa->total_credit = $completed_credit +  $previousResults->completed_credit;

                $sessionsemestercgpa->save();
            }
        }




        if ($request->year  == 2) {

            $title  = '2ndYear_Semester GPA & CGPA';
            $results = result::where('session_id', $request->session_id)
                ->where('department_id', $request->department_id)
                ->where('session_id', $request->session_id)
                ->where('semester_id', '>', 2)
                ->orderBy('student_id')
                ->get();
        }


        if ($request->year  == 3) {

            $title  = '3rdYear_Semester GPA & CGPA';
            $results = result::where('session_id', $request->session_id)
                ->where('department_id', $request->department_id)
                ->where('session_id', $request->session_id)
                ->where('semester_id', '>', 4)
                ->where('semester_id', '<', 7)
                ->orderBy('student_id')
                ->get();
        }
        if ($request->year  == 4) {

            $title  = '4thYear_Semester GPA & CGPA';
            $results = result::where('session_id', $request->session_id)
                ->where('department_id', $request->department_id)
                ->where('session_id', $request->session_id)
                ->where('semester_id', '>', 6)
                ->where('semester_id', '<', 9)
                ->orderBy('student_id')
                ->get();
        }


        $sudySession  = studySession::find($request->session_id);
        $department  = department::find($request->department_id);


        return $results;
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
     * @param  \App\Http\Requests\StoresessionSemesterCpgaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoresessionSemesterCpgaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\sessionSemesterCpga  $sessionSemesterCpga
     * @return \Illuminate\Http\Response
     */
    public function show(sessionSemesterCpga $sessionSemesterCpga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\sessionSemesterCpga  $sessionSemesterCpga
     * @return \Illuminate\Http\Response
     */
    public function edit(sessionSemesterCpga $sessionSemesterCpga)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatesessionSemesterCpgaRequest  $request
     * @param  \App\Models\sessionSemesterCpga  $sessionSemesterCpga
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatesessionSemesterCpgaRequest $request, sessionSemesterCpga $sessionSemesterCpga)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\sessionSemesterCpga  $sessionSemesterCpga
     * @return \Illuminate\Http\Response
     */
    public function destroy(sessionSemesterCpga $sessionSemesterCpga)
    {
        //
    }
}
