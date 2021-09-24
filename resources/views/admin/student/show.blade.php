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
                $credits2 += $result2->course->credit;
                $points2 += ($result2->point * $result2->course->credit);
                @endphp

                <!-- <p>   {{$credits2}}    </p>
<p>    {{$points2}}  </p>
--- -->
                @endforeach     
                 @endforeach











        <div class="nk-block-head-content">
            <h4 class="nk-block-title"> {{$student->name}} | {{$student->reg}}   (  {{floor(($points2/$credits2)*100)/100}}    ) </h4>
            <!-- <div class="nk-block-des">
                <p>All Projects And Task Details</p>

                <a href="#" class="btn btn-primary">Yesterday</a>


            </div> -->
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
                $credits += $result->course->credit;
                $points += ($result->point * $result->course->credit);
                @endphp
            @endforeach

            <h5> {{   $semester->title}} (  {{floor(($points/$credits)*100)/100}}    )</h5>

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