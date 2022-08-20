<?php

namespace App\Http\Controllers;

use App\Models\sessionSemesterCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $data=[
        //     '201256'=>[
        //         'title' =>'TT marks',
        //         'marks' =>'30',
        //     ],
        // ];
        // $data =json_encode(json_encode(json_encode($data)));
        //  return $data;
// return  $currentURL = url()->previous();
        
        
         $session_semester_course= sessionSemesterCourse::where('session_id',$request->session_id)->where('semester_id',$request->semester_id)->where('course_id',$request->course_id)->where('department_id',$request->department_id)->first();



     

         $fields =json_decode(($session_semester_course->fields));
        // return $session_semester_course;

         return view('admin.fields.edit',compact('fields','session_semester_course'));
       
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
        // return $request;


        $session_semester_course= sessionSemesterCourse::find($request->data_id);
        $fields =json_decode(($session_semester_course->fields));
        $key= time();
        $dynamic= 0;
        if($request->is_dynamic)
        $dynamic=1;
        $fieldDetails=array(
            'field_title' =>$request->field_title, 
            'field_marks' =>$request->field_marks, 
            'is_dynamic' =>$dynamic, 
        );
        $fields->$key= $fieldDetails;

        $fields =json_encode(($fields));
        

        $session_semester_course->fields=   $fields;
        $session_semester_course->save();
 
// return $session_semester_course;
        return redirect($request->success_url);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return "edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return $request;
        $session_semester_course= sessionSemesterCourse::find($request->data_id);
        $fields =json_decode(($session_semester_course->fields));
        $key= $request->data_key;
        $fields->$key= $request->field;
        // return $fields->$key;
        $fields =json_encode(($fields));

        $session_semester_course->fields=   $fields;
        $session_semester_course->save();
        // return $session_semester_course;

        return redirect($request->success_url);

        return back();
        
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request , $id)
    {
       
        // return $request;
        $session_semester_course= sessionSemesterCourse::find($request->data_id);
        $fields =json_decode(($session_semester_course->fields));
        $key= $request->data_key;
        unset($fields->$key);
        // return $fields->$key;
        $fields =json_encode(($fields));

        $session_semester_course->fields=   $fields;
        $session_semester_course->save();
        // return $session_semester_course;

        
        return redirect($request->success_url);
        return back();

       
    }
}
