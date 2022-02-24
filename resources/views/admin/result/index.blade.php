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
            <div class="nk-block-des">
                <p> Session : {{$studySession->title}}</p>

                <!-- <a href="#" class="btn btn-primary">Yesterday</a> -->


            </div>
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
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Semester </span></th>
                        <th class="nk-tb-col tb-col-md text-center"><span class="sub-text">Courses </span></th>


                    </tr>
                </thead>


                <tfoot>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Semester </span></th>
                        <th class="nk-tb-col tb-col-md text-center"><span class="sub-text">Courses </span></th>


                    </tr>
                </tfoot>

                <tbody>

                    @php($i =1)
                    @foreach($semesters as $semester)

                    <tr class="nk-tb-item ">


                        <td class="nk-tb-col">{{$i++}}</td>

                        <td class="nk-tb-col">{{$semester->title}}</td>


                        <td class="nk-tb-col">


                            @if(isset($courses[$semester->id]))

                            @php($ind =1)
                            @foreach ( $courses[$semester->id] as $data)
                            @php($course = \App\Models\course::find($data->course_id))
                            
                            <a href="{{route('results.edit',$course->id)}}?course_id={{$course->id}}&&session_id= {{$studySession->id}}&&semester_id= {{$semester->id}}&&department_id= {{$department->id}}" class="btn btn-success btn-sm p-1 mt-2 mb-2 mr-4 " style="padding: 2px;">{{$course->course_code }}</a>
                            @if($ind++ ==4) <br> @endif
                            @endforeach

                            @endif

                        </td>





                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection