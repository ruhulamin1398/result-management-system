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


        return view('admin.result.index', compact('courses', 'semesters', 'studySession', 'department'));
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
    public function edit(Request $request, $result)
    {


        /////////////////////v2//////////////////////

        $session_semester_course = sessionSemesterCourse::where('session_id', $request->session_id)->where('semester_id', $request->semester_id)->where('course_id', $request->course_id)->where('department_id', $request->department_id)->first();
        $fields = json_decode(($session_semester_course->fields));

        $department = department::find($request->department_id);

        $results = result::where('session_id', $request->session_id)->where('semester_id', $request->semester_id)->where('course_id', $request->course_id)->where('is_registered', 1)->get();
        $course = course::find($request->course_id);
        $studySession = studySession::find($request->session_id);
        $semester = semester::find($request->semester_id);


        // check all field exists on every results. if doesn't exist add this with valo 0  and save this on data base 

        // return $results;

        foreach ($results as $result) {
            $field_marks = json_decode($result->field_marks);
            foreach ($fields as $key => $field) {
                if (!isset($field_marks->$key)) {
                    $field_marks->$key = array(
                        'marks' => 0,
                        'field_marks' =>  $field->field_marks,
                        'field_title' => $field->field_title,
                        'is_dynamic' => $field->is_dynamic,
                    );
                }
            }
            $result->field_marks = json_encode($field_marks);
            $result->save();


            // calculating total marks 

              $this->Resultcalculation($result);
             
        }

        return view('admin.result.edit', compact('results', 'course', 'department', 'fields', 'studySession', 'semester'));


        ////////////////////v2//////////////////////



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
        $field_marks =    json_decode(($result->field_marks));

      
        foreach($request->field as $key => $value){
             $field_marks->$key->marks =$value ;
            
        }

        // return $field_marks;
        $result->field_marks = json_encode($field_marks);
        $result->save();

        $this->Resultcalculation($result);
        
       
        return $result;

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


    public function Resultcalculation(result $result)
    {
        // return $result;
        $totalMarks = 0;
        $staticMarks = 0;
        $dynamicMarks = 0;
        $staticFieldMarks = 0;
        $dynamicFieldMarks = 0;

        $field_marks = json_decode($result->field_marks);

        foreach ($field_marks as $key => $fieldList) {
            if ($fieldList->is_dynamic == 1) {

                $dynamicMarks += $fieldList->marks;;
                $dynamicFieldMarks += $fieldList->field_marks;
            } else {

                $staticMarks += $fieldList->marks;
                $staticFieldMarks += $fieldList->field_marks;
            }
        }

        $course_marks = course::find($result->course_id)->marks;
        $totalMarks = (($course_marks - $staticFieldMarks) / $dynamicFieldMarks) * $dynamicMarks + $staticMarks;
        //  return compact('totalMarks','staticFieldMarks','staticMarks','dynamicFieldMarks','dynamicMarks' );

         $result->field_marks = json_encode($field_marks);
        $result->total_marks =  $totalMarks;
        $result->save();


        if ($totalMarks >= 80) {
            $result->point = 4;
            $result->letter = "A+";
        } else if ($totalMarks >= 75) {
            $result->point = 3.75;
            $result->letter = "A";
        } else if ($totalMarks >= 70) {
            $result->point = 3.5;
            $result->letter = "A-";
        } else if ($totalMarks >= 65) {
            $result->point = 3.25;
            $result->letter = "B+";
        } else if ($totalMarks >= 60) {
            $result->point = 3.00;
            $result->letter = "B";
        } else if ($totalMarks >= 55) {
            $result->point = 2.75;
            $result->letter = "B-";
        } else if ($totalMarks >= 50) {
            $result->point = 2.5;
            $result->letter = "C+";
        } else if ($totalMarks >= 45) {
            $result->point = 2.25;
            $result->letter = "C-";
        } else  if ($totalMarks >= 40) {
            $result->point = 2.00;
            $result->letter = "D";
        } else {
            $result->point = 0;
            $result->letter = "F";
        }

        $result->save();




         
    }
}
