<?php

namespace App\Http\Controllers;

use App\Models\enrollCourse;
use App\Http\Requests\StoreenrollCourseRequest;
use App\Http\Requests\UpdateenrollCourseRequest;
use App\Models\course;
use App\Models\courseOffering;
use App\Models\result;
use App\Models\semester;
use App\Models\sessionSemesterCourse;
use Illuminate\Support\Facades\Auth;

class EnrollCourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profile = Auth::user()->profile;
        $courseOffering = courseOffering::where('department_id', $profile->department_id)->where('session_id', $profile->session_id)->where('is_open', 1)->first();
        if (is_null($courseOffering)) {

            // return "No Courses offer yet";
            $results = array();
            $availableCourses = array();
        } else {



            $availableCourses = sessionSemesterCourse::where('department_id', $profile->department_id)->where('session_id', $profile->session_id)->where('semester_id', $courseOffering->semester_id)->where('is_Active', 1)->get();


            foreach ($availableCourses as $course) {
                $isExist = result::where('semester_id', $courseOffering->semester_id)->where('student_id', $profile->id)->where('course_id', $course->course_id)->first();

                if (is_null($isExist)) {
                    $result = new  result;
                    $result->semester_id = $courseOffering->semester_id;
                    $result->registered_at = $courseOffering->semester_id;
                    $result->course_id = $course->course_id;
                    $result->student_id = $profile->id;
                    
                    $result->session_id = $profile->session_id;
                    $result->is_drop = 0;
                    $result->save();
                }
            }

            $results = result::where('semester_id', $courseOffering->semester_id)->where('student_id', $profile->id)->get();
        }



        ######################################################
        #       Drop course calculation 
        #       ------------------------
        #   1. find all courses where point 0 -> only last one of every course
        #   2. check already clered or not 
        #   3. exclude if it on current semester -> the last semester he register course 
        #   4. marked  if it currently  open in any  session and save the session_id 
        #   5. if already added in result table push the the id other wise  create a  new entry and push this.
        #   
        #
        #
        ######################################################


        /// all drop courses ever
        
        $dropCourses = result::where('student_id', $profile->id)->where('point', '=', 0)->get();


        $currentSemester = result::where('student_id', $profile->id)->orderByDesc('semester_id')->first()->semester_id??1;
        // return $currentSemester;
        $dropCourseArray = array();
        $dropCourseArrayUnAvailable = array();
        foreach ($dropCourses as $course) {


            ### for every course 
            $courseSessionId = 0;

            // check if already cleared or not 
            $isExist = result::where('student_id', $profile->id)->where('course_id', $course->course_id)->latest()->first();

            if ($isExist->point == 0) {
                // if not cleared 
                $isfoundInCurrentSemester = 0;
                // check if it on current semester or not 
                foreach ($availableCourses as $availableCourse) {
                    if ($availableCourse->course_id == $isExist->course_id) {
                        // echo $availableCourse->course_id." == ". $isExist->course_id. ' </br>'  ;
                        $isfoundInCurrentSemester = 1;
                    }
                }
                // if not is current semeter
                if ($isfoundInCurrentSemester == 0) {

                    // check is  it already open in any session 

                    ################
                    #   1. search all opened sessions
                    #   2. check if it has this course or not 
                    #
                    #
                    if (is_null($courseOffering)) {
                        $allOpenedSessions= array();
                    }
                    else{

                   
                    $allOpenedSessions = courseOffering::where('department_id', $profile->department_id)->where('is_open', 1)->where('id', '!=', $courseOffering->id)->get();
                    // return $allOpenedSessions;
                }
                    foreach ($allOpenedSessions as $allOpenedSession) {
                        // return $allOpenedSession;

                        $allOpenedSessionsAvailableCourses = sessionSemesterCourse::where('department_id', $profile->department_id)->where('session_id', $allOpenedSession->session_id)->where('semester_id', $allOpenedSession->semester_id)->where('is_Active', 1)->get();
                        // return  $allOpenedSessionsAvailableCourses;

                        foreach ($allOpenedSessionsAvailableCourses as $allOpenedSessionsAvailableCourse) {
                            // echo $allOpenedSessionsAvailableCourse;
                            // echo "<br>";

                            if ($allOpenedSessionsAvailableCourse->course_id ==  $isExist->course_id) {
                                $courseSessionId =  $allOpenedSession->session_id;


                                // echo  $allOpenedSessionsAvailableCourse;
                                // echo "<br>";
                                break;
                            }
                        }
                    }


                    if ($courseSessionId == 0) {
                        $dropCourseArrayUnAvailable[$isExist->course_id] = course::find($isExist->course_id);
                    } else {

                        //////////////////

                        $isAlreadyregistered = result::where('student_id', $profile->id)->where('course_id', $course->course_id)->where('session_id',  $courseSessionId)->latest()->first();

                        if (is_null($isAlreadyregistered)) {

                            $result = new  result;
                            $result->semester_id = $course->semester_id;
                            $result->course_id = $course->course_id;
                            $result->student_id = $profile->id;
                            $result->registered_at = $currentSemester;
                            $result->session_id = $courseSessionId;
                            $result->is_drop = 1;
                            $result->save();
                            // add this into  drop course
                            $dropCourseArray[$isExist->course_id] = $isExist;
                        } else {


                            $dropCourseArray[$isAlreadyregistered->course_id] = $isAlreadyregistered;
                        }
                    }
                }
            }

            // return $course;

            // if (is_null($isExist)) {
            //     $result = new  result;
            //     $result->semester_id = $course->semester_id; //current semester id 
            //     $result->course_id = $course->course_id;
            //     $result->student_id = $profile->id;
            //     $result->session_id = $profile->session_id;
            //     $result->is_drop = 1;
            //     // $result->save();
            //     return  $result;
            // }
            // return  "new";

        }


        // return  $dropCourseArray;
        // return $dropCourses;
        // return $dropCourseArrayUnAvailable;
        // return;

        return view('student.course.enroll', compact('results', 'dropCourses', 'dropCourseArray', 'dropCourseArrayUnAvailable'));
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
    public function edit($enrollCourse)
    {
        $result = result::find($enrollCourse);
        if ($result->is_registered == 0)
            $result->is_registered = 1;
        else
            $result->is_registered = 0;
        $result->save();
        return back();
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
