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
            <h4 class="nk-block-title">{{$department->title}}</h4>
            <!-- <div class="nk-block-des">
                <p>All Projects And Task Details</p>

                <a href="#" class="btn btn-primary">Yesterday</a>


            </div> -->
        </div>
    </div>

    <div class="card card-preview">
        <div class="card-inner">
            <div class="nk-block-des">

            </div>

            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                <thead>

                    <tr class="nk-tb-item nk-tb-head">

                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Title </span></th>
                        <th class="nk-tb-col tb-col-md text-center" ><span class="sub-text">semesters </span></th>


                    </tr>
                </thead>


                <tfoot>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Title </span></th>
                        <th class="nk-tb-col tb-col-md text-center" ><span class="sub-text">semesters </span></th>


                    </tr>
                </tfoot>

                <tbody>
                    @php($i =1)
                    @foreach($sessions as $session)
                    <tr class="nk-tb-item ">


                        <td class="nk-tb-col">{{$i++}}</td>

                        <td class="nk-tb-col">{{$session->title}}</td>

                        <td class="nk-tb-col">
                         
                             
                        @php($ind =1)
                            @foreach ( $courseOffering[$session->id] as $semester) 
                             {{\App\Models\semester::find($semester->semester_id)->title }}   
                              
                             
                            @if($semester->is_open == 0)
                           
                            <a href="{{route('course-offerings.edit',$semester->id)}}" class="btn btn-danger btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">Closed</a> 
                            @else
                          
                            <a href="{{route('course-offerings.edit',$semester->id)}}" class="btn btn-success btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">Running</a> 
                            @endif
                             
                             
                             
                              @if($ind++ ==4) <br> @endif
                            @endforeach

                        </td> 
                        

                        {{--

                        <td class="nk-tb-col">{{$course->course->course_code}}</td>
                        <td class="nk-tb-col">{{$course->course->title}}</td>

                        <td class="nk-tb-col">{{$course->course->credit}} </td>
                        <td class="nk-tb-col">

                            @if($course->course->type==1)
                            Theory
                            @else
                            Lab
                            @endif

                        </td>

                        @if($course->is_active==1)

                        <td class="nk-tb-col">
                             <a href="{{route('session_semester_courses.edit',$course->id)}}" class="btn btn-danger btn-sm p-1" style="padding: 2px;">Remove</a>
                             </td>

                        @else

                        <td class="nk-tb-col"> <a href=" {{route('session_semester_courses.edit',$course->id)}}" class="btn btn-success btn-sm p-1" style="padding: 2px;">Add</a> </td>

                        @endif


                        --}}


                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection