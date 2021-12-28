<?php

namespace App\Http\Controllers;

use App\Models\department;
use App\Models\result;
use App\Models\student;
use App\Models\studySession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $students=  student::where('department_id',$request->department_id)->where('session_id',$request->session_id)->get();
       $department= department::find($request->department_id);
      
     
       return view('admin.student.index',compact('students','department'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = department::all();
        $study_sessions = studySession::orderBy('id','desc')->get();

        return view('admin.student.create',compact('study_sessions','departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make(1234);
        $user->save();


        DB::table('model_has_roles')->insert([
            [
                'role_id' => 2,
                'model_type' => 'App\Models\User',
                'model_id' => $user->id,
            ],  
        ]);



        


        $student = new student;
        $student->name = $request->name;
        $student->reg = $request->reg;
        $student->phone = $request->phone;
        $student->sex = $request->sex;
        $student->address = $request->address;
        $student->user_id = $user->id;
        $student->session_id = $request->session_id;
        $student->department_id = $request->department_id;

        $student->save();

        return redirect(route('students.show',$student->id));

        // return $student;
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {

        $results= result::where('student_id',$student->id)->get()->groupBY('semester_id');

        // return $results;
        return view('admin.student.show',compact('student','results'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        $departments = department::all();
        $study_sessions = studySession::orderBy('id','desc')->get();

        return view('admin.student.edit',compact('study_sessions','departments','student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
      

        
        $student->name = $request->name;
        $student->reg = $request->reg;
        $student->phone = $request->phone;
        $student->sex = $request->sex;
        $student->address = $request->address;
        $student->session_id = $request->session_id;
        $student->department_id = $request->department_id;

        $student->save();

        return redirect(route('students.show',$student->id));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }
}
