<?php

namespace App\Http\Controllers;

use App\Models\course;
use App\Models\department;
use App\Models\result;
use App\Models\semester;
use App\Models\sessionSemesterCourse;
use App\Models\studySession;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
        $department = department::find($request->department_id);
        $studySession = studySession::find($request->session_id);
        $semesters = semester::all();

         $courses = sessionSemesterCourse::where('department_id', $request->department_id)->where('session_id', $request->session_id)->where('is_Active', 1)->get()->groupBy('semester_id');

      
        return view('admin.result.index',compact('courses','semesters','studySession','department'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\result  $result
     * @return \Illuminate\Http\Response
     */
    public function show(result $result)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\result  $result
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$result)
    {
        


        $session_semester_course= sessionSemesterCourse::where('session_id',$request->session_id)->where('semester_id',$request->semester_id)->where('course_id',$request->course_id)->where('department_id',$request->department_id)->first();
        $fields =json_decode(($session_semester_course->fields));

      $department= department::find($request->department_id);

        $results= result::where('session_id',$request->session_id)->where('semester_id',$request->semester_id)->where('course_id',$request->course_id)->where('is_registered',1)->get();
        $course= course::find($request->course_id);
        $studySession= studySession::find($request->session_id);
        $semester= semester::find($request->semester_id);

        return view('admin.result.edit',compact('results','course','department','fields','studySession','semester'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\result  $result
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, result $result)
    {

        $result->attendance_marks= $request->attendance_marks;
        $result->class_test_marks= $request->class_test_marks;
        $result->a_code= $request->a_code;
        $result->a_marks= $request->a_marks;
        $result->b_code= $request->b_code;
        $result->b_marks= $request->b_marks;
 

        $totalMarks= $result->attendance_marks+ $result->class_test_marks + $result->a_marks+ $result->b_marks;
        $result->total_marks = $totalMarks;


        $course_marks = course::find($result->course_id)->marks;
        $totalMarks= ($totalMarks/$course_marks)*100;
        if($totalMarks >=80){
            $result->point=4;
            $result->letter="A+";
        }
       else if($totalMarks >=75){
            $result->point=3.75;
            $result->letter="A";
        }
        else if($totalMarks >=70){
            $result->point=3.5;
            $result->letter="A-";
        }
        else if($totalMarks >=65){
            $result->point=3.25;
            $result->letter="B+";
        }
        else if($totalMarks >=60){
            $result->point=3.00;
            $result->letter="B";
        }

        else if($totalMarks >=55){
            $result->point=2.75;
            $result->letter="B-";
        }

        else if($totalMarks >=50){
            $result->point=2.5;
            $result->letter="C+";
        }

        else if($totalMarks >=45){
            $result->point=2.25;
            $result->letter="C-";
        }

        else  if($totalMarks >=40){
            $result->point=2.00;
            $result->letter="D";
        }
        else  {
            $result->point=0;
            $result->letter="F";
        }

        $result->save();
        return true;

         return redirect(route('results.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\result  $result
     * @return \Illuminate\Http\Response
     */
    public function destroy(result $result)
    {
        //
    }
}
