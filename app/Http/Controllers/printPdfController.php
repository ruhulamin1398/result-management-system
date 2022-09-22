<?php

namespace App\Http\Controllers;

use App\Models\result;
use App\Models\department;
use App\Models\studySession;
use Illuminate\Http\Request;
 
class printPdfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
      
        if($request->year  ==1 ){

            $title  = '1stYear_Marksheet';
              $results = result::where('session_id', $request->session_id) 
              ->where('department_id', $request->department_id) 
              ->where('session_id', $request->session_id)  
              ->where('semester_id','>' , 0)   
              ->where('semester_id','<' , 3)  
              ->orderBy('student_id')
              ->get();
          }

  
       
      
          if($request->year  ==2 ){

            $title  = '2ndYear_Marksheet';
              $results = result::where('session_id', $request->session_id) 
              ->where('department_id', $request->department_id) 
              ->where('session_id', $request->session_id)  
              ->where('semester_id','>' , 2)   
              ->where('semester_id','<' , 5)  
              ->orderBy('student_id')
              ->get();
          }

      
          if($request->year  ==3 ){

            $title  = '3rdYear_Marksheet';
              $results = result::where('session_id', $request->session_id) 
              ->where('department_id', $request->department_id) 
              ->where('session_id', $request->session_id)  
              ->where('semester_id','>' , 4)   
              ->where('semester_id','<' ,7)  
              ->orderBy('student_id')
              ->get();
          }   
            if($request->year  ==4 ){

            $title  = '4thYear_Marksheet';
              $results = result::where('session_id', $request->session_id) 
              ->where('department_id', $request->department_id) 
              ->where('session_id', $request->session_id)  
              ->where('semester_id','>' , 6)   
              ->where('semester_id','<' ,9)  
              ->orderBy('student_id')
              ->get();
          }
                        

    $sudySession  = studySession::find($request->session_id);
    $department  = department::find($request->department_id);
   
 
        return view('admin.result.print', compact('results','sudySession','department','title'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
