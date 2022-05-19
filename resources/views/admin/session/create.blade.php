@extends('admin.includes.app')


@section('content')



<div class="nk-block nk-block-lg">



    <div class="nk-block-head">

        @if(session('success'))

        <div class="alert alert-success alert-dismissible fade show center" role="alert">
            <strong>{{ session('success')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @elseif(session('error'))


        <div class="alert alert-danger alert-dismissible fade show center" role="alert">
            <strong>{{ session('error')}}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            </button>
        </div>
        @endif
        <div class="nk-block-head-content">
            <h4 class="nk-block-title">New Session</h4>
            <!-- <div class="nk-block-des">
                <p>All Projects And Task Details</p>

                <a href="#" class="btn btn-primary">Yesterday</a>


            </div> -->
        </div>
    </div>

    <div class="card card-preview">
        <div class="card-inner">





            <form action="{{route('study_sessions.store')}}" method="post">


            @csrf
                <div class="row g-4">

                    



                    <div class=" col-12 col-lg-8 ">
                        <div class="form-group">
                             <div class="form-control-wrap">
                                <input type="text" placeholder="2020-2021" name="title" class="form-control" id="full-name-1" required>
                            </div>
                        </div>
                    </div>
                    
                  





                  
                    <div class="col-4">
                        <div class="form-group">
                            <button type="submit" class="btn  btn-primary">Create Session</button>
                        </div>
                    </div>
                </div>
            </form>










        </div>
    </div>
</div>




<div class="nk-block nk-block-lg">

 

    <div class="card card-preview">
        <div class="card-inner">

            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                <thead>

                    <tr class="nk-tb-item nk-tb-head">
                    <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Title </span></th> 
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action </span></th>   
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">CSE (semester) </span></th> 
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">EEE (semester) </span></th> 
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">CE (semester) </span></th> 


                    </tr>
                </thead>


                <tfoot>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Title </span></th> 
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Action </span></th> 
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">CSE (semester) </span></th> 
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">EEE (semester) </span></th> 
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">CE (semester) </span></th> 


                    </tr>
                </tfoot>

                <tbody>
                    @php($i =1)
                    @foreach($studySessions as $session)
                    <tr class="nk-tb-item ">

                        <td class="nk-tb-col">{{$i++}}</td>
                        <td class="nk-tb-col">{{$session->title}}</td>


                        <td class="nk-tb-col"> 
                             <a href="{{route('study_sessions.edit',$session->id)}}"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">edit</a>
                             <a href="{{route('study_sessions.destroy',$session->id)}}"   onclick="return confirm('Are you sure you want to delete this Session: '+'{{$session->title}}')"  class="btn btn-danger btn-sm p-1 mt-1" style="padding: 2px;">Delete</a>
                            
                        </td> 
                   
                        <td class="nk-tb-col">  
                            <a href="{{route('session_semester_courses.index')}}?department_id=1&&session_id={{$session->id}}&&semester_id=1"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">1st</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=1&&session_id={{$session->id}}&&semester_id=2"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">2nd</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=1&&session_id={{$session->id}}&&semester_id=3"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">3rd</a>  
                            <a href="{{route('session_semester_courses.index')}}?department_id=1&&session_id={{$session->id}}&&semester_id=4"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">4th</a>
                            <br> 
                            <a href="{{route('session_semester_courses.index')}}?department_id=1&&session_id={{$session->id}}&&semester_id=5"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">5th</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=1&&session_id={{$session->id}}&&semester_id=6"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">6th</a>  
                            <a href="{{route('session_semester_courses.index')}}?department_id=1&&session_id={{$session->id}}&&semester_id=7"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">7th</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=1&&session_id={{$session->id}}&&semester_id=8"  class="btn btn-success btn-sm p-1 mt-1 mt-1" style="padding: 2px;">8th</a>
                          </td> 
                        <td class="nk-tb-col">  
                            <a href="{{route('session_semester_courses.index')}}?department_id=2&&session_id={{$session->id}}&&semester_id=1"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">1st</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=2&&session_id={{$session->id}}&&semester_id=2"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">2nd</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=2&&session_id={{$session->id}}&&semester_id=3"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">3rd</a>  
                            <a href="{{route('session_semester_courses.index')}}?department_id=2&&session_id={{$session->id}}&&semester_id=4"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">4th</a>
                           <br> 
                            <a href="{{route('session_semester_courses.index')}}?department_id=2&&session_id={{$session->id}}&&semester_id=5"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">5th</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=2&&session_id={{$session->id}}&&semester_id=6"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">6th</a>  
                            <a href="{{route('session_semester_courses.index')}}?department_id=2&&session_id={{$session->id}}&&semester_id=7"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">7th</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=2&&session_id={{$session->id}}&&semester_id=8"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">8th</a>
                          </td> 
                        <td class="nk-tb-col">  
                            <a href="{{route('session_semester_courses.index')}}?department_id=3&&session_id={{$session->id}}&&semester_id=1"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">1st</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=3&&session_id={{$session->id}}&&semester_id=2"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">2nd</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=3&&session_id={{$session->id}}&&semester_id=3"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">3rd</a>  
                            <a href="{{route('session_semester_courses.index')}}?department_id=3&&session_id={{$session->id}}&&semester_id=4"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">4th</a>
                            <br>
                            <a href="{{route('session_semester_courses.index')}}?department_id=3&&session_id={{$session->id}}&&semester_id=5"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">5th</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=3&&session_id={{$session->id}}&&semester_id=6"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">6th</a>  
                            <a href="{{route('session_semester_courses.index')}}?department_id=3&&session_id={{$session->id}}&&semester_id=7"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">7th</a>
                            <a href="{{route('session_semester_courses.index')}}?department_id=3&&session_id={{$session->id}}&&semester_id=8"  class="btn btn-success btn-sm p-1 mt-1" style="padding: 2px;">8th</a>
                          </td>    
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>














@endsection