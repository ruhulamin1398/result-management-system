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


        @php
        $credits2=0;
        $points2=0;

        @endphp
        @foreach($results as $resultList)


        @foreach($resultList as $result2)

        @php
        if($result2->point !=0){
        $credits2 += $result2->course->credit;
        $points2 += ($result2->point * $result2->course->credit);
        }
        @endphp

        <!-- <p>   {{$credits2}}    </p>
<p>    {{$points2}}  </p>
--- -->
        @endforeach
        @endforeach





        @php
        $cgpa=0;

        if($credits2 !=0){

        $cgpa = floor(($points2/$credits2)*100)/100;
        }
        $student->cgpa= $cgpa;
        $student->save();
        @endphp





        <div class="nk-block-head-content">
            <h4 class="nk-block-title"> {{$student->name}} | {{$student->reg}} ( {{$cgpa}} ) </h4>
            <div class="nk-block-des">

                <p>
               <a href="{{route('students.edit',$student->id)}}" class="btn btn-primary">Edit Profile</a>
               <!-- <a href="{{route('downloadStudentPdf',$student->id)}}" class="btn btn-primary">Download</a> -->

                </p>
            </div>
        </div>
    </div>

    <div class="container p-4">
        <div class="row">
            <div class="col-lg-6">
                <ul>

                    <li><i class="bi bi-chevron-right"></i> <strong>Registration Number:</strong> <span>{{$student->reg}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong> <span>{{$student ->phone}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Sex</strong> <span>{{$student ->sex}}</span></li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul>
                    <li><i class="bi bi-chevron-right"></i> <strong>Address</strong> <span>{{$student ->address}}</span></li>

                    <li><i class="bi bi-chevron-right"></i> <strong>Session:</strong> <span>{{$student ->session->title}}</span></li>
                    <li><i class="bi bi-chevron-right"></i> <strong>Department:</strong> <span>{{$student ->department->title}}</span></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="card card-preview">
        <div class="card-inner">

            @foreach($results as $key=>$results)
            @php
            $semester= App\Models\semester::find($key);
            $credits=0;
            $points=0;

            @endphp

            @foreach($results as $result)

            @php
            if($result->point !=0){
            $credits += $result->course->credit;
            $points += ($result->point * $result->course->credit);

            }
            @endphp
            @endforeach

            <h5> {{ $semester->title}} ( @if($credits==0) 0 @else {{floor(($points/$credits)*100)/100}} @endif )</h5>

            <table class="datatable-init nowrap nk-tb-list nk-tb-ulist" data-auto-responsive="true">

                <thead>

                    <tr class="nk-tb-item nk-tb-head">
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">SL</span></th>
                        <th class="nk-tb-col tb-col-mb"><span class="sub-text">Course Code </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Course Title </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Credit </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Grade </span></th>
                        <th class="nk-tb-col tb-col-md"><span class="sub-text">Point </span></th>

                    </tr>
                </thead>



                <tbody>

                    @php

                    $i =1;
                    $credits=0;
                    $points=0;

                    @endphp
                    @foreach($results as $result)


                    @csrf
                    <tr class="nk-tb-item ">

                        <td class="nk-tb-col">{{$i++}}</td>
                        <td class="nk-tb-col">{{$result->course->course_code}}</td>
                        <td class="nk-tb-col">{{$result->course->title}}</td>
                        <td class="nk-tb-col">{{$result->course->credit}}</td>
                        <td class="nk-tb-col">{{$result->letter}}</td>
                        <td class="nk-tb-col">{{$result->point}}</td>

                    </tr>

                    @endforeach




                </tbody>





            </table>


            @endforeach


        </div>
    </div>
</div>














@endsection